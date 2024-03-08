<?php

namespace App\Livewire\Admin\Ai;

use App\Models\AiAssistant;
use App\Services\OxylabAmazon;
use App\Services\Sacraping;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class GenerateReviewsComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
   
    public $platform;
    public $product;
    public $aiId;
    public $api_key;
    public $prompt;
    
    public $loaderMessage ='Product reviews has been getting...';
    public $data;
    public function mount($id)
    {
        $this->aiId = $id;
        $ai = AiAssistant::find($this->aiId);
        $this->prompt = $ai->prompt;
        $this->api_key = $ai->setting->api_key;
    }

    public function getReviews()
    {
        $this->validate([
            'product'=>'required',
            'platform'=>'required',
        ]);
        if ($this->platform === 'amazon') {
            sleep(1);
            $this->updateLoader();
            $review = new OxylabAmazon();
            $getreviews = $review->genUrl($this->product);
            $this->dispatch('updateLoader','Reviews have been received. Starting analysis...');
           // dd($getreviews);
    
            $sacrapingInstance = new Sacraping();
            $data = $sacrapingInstance->promptGenForAmazon($getreviews, $this->api_key, $this->prompt);
    
            if ($data['status'] === 200) {
                $this->dispatch('updateLoader', 'Analysis complete.');
    
                $response = $data['response'];
                $this->data = nl2br($response);
                // $this->storeProject($data);
            } elseif ($data['status'] === 201) {
                // Handle API error
                $this->dispatch('updateLoader', 'Error: ' . $data['response']);
                $this->alert('error',$data['response']);
            } elseif ($data['status'] === 403) {
                // Handle exception
                $this->dispatch('updateLoader', 'Exception: ' . $data['response']);
                $this->alert('error',$data['response']);
            }
         
    
           
        }
        if ($this->platform === 'b&n') {
            if (filter_var($this->productId, FILTER_VALIDATE_URL)) {
                // If the input is a URL, extract the product ID
                $url = $this->productId;
                $parsedUrl = parse_url($url);
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $queryParameters);
                    if (isset($queryParameters['ean'])) {
                        $productId = $queryParameters['ean'];
                    } else {
                        return dd("Product ID (ean) not found in the URL");
                    }
                } else {
                    return dd("Query parameters not found in the URL");
                }
            } else {
                // If the input is already a product ID, use it directly
                $productId = $this->productId;
            }

            $url = "https://api.bazaarvoice.com/data/batch.json?passkey=caC2Xb0kazery1Vgcza74qqETLsDbclQWr3kbWiGXSvjI&apiversion=5.5&displaycode=19386_1_0-en_us&resource.q1=reviews&filter.q1=isratingsonly%3Aeq%3Afalse&filter.q1=productid%3Aeq%3A{$productId}&filter.q1=contentlocale%3Aeq%3Aen*%2Cen_US&sort.q1=relevancy%3Aa1&stats.q1=reviews&filteredstats.q1=reviews&include.q1=authors%2Cproducts%2Ccomments&filter_reviews.q1=contentlocale%3Aeq%3Aen*%2Cen_US&filter_reviewcomments.q1=contentlocale%3Aeq%3Aen*%2Cen_US&filter_comments.q1=contentlocale%3Aeq%3Aen*%2Cen_US&limit.q1=100&offset.q1=0&limit_comments.q1=3";

            // Make the HTTP request
            $response = Http::get($url);

            if ($response->successful()) {
                $json_response = $response->json();
                //dd($json_response);
                $data = $json_response['BatchedResults']['q1']['Results'];
                $sacrapingInstance = new Sacraping(); // Create an instance of the Sacraping class
                $data = $sacrapingInstance->promptGen($data); // Call the method on the instance
                if ($data['status'] === 200) {
                    // Save the data when status is 200
                    $this->storeProject($data);
                }
            }
        } elseif ($this->platform === 'goodreads') {
            $productId = $this->productId;
            $apiToken = env('API_TOKEN');
            $actorId = 'sk1JsDmbderUw0J79';
            $response = Http::withToken($apiToken)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post("https://api.apify.com/v2/acts/{$actorId}/run-sync-get-dataset-items", [

                    "includeReviews" => true,
                    "startUrls" => [$productId],

                    "extendOutputFunction" => "($) => { return {} }",
                    "customMapFunction" => "(object) => { return {...object} }",
                    "proxy" => [
                        "useApifyProxy" => true,
                        "apifyProxyGroups" => ["RESIDENTIAL"],
                    ],
                    "maxItems" => 1,
                    "endPage" => 2,
                    'query' => [
                        'timeout' => 300,
                    ],

                ]);
            $json_response = $response->json();
            //dd($json_response);
            $reviews = $json_response[0]['reviews']; // Assuming $response contains your JSON data
            //dd($reviews);
            $sacrapingInstance = new Sacraping(); // Create an instance of the Sacraping class
            $data = $sacrapingInstance->promptGenForGoodreads($reviews); // Call the method on the instance
            if ($data['status'] === 200) {
                // Save the data when status is 200
                $this->storeProject($data);
            }

        }
    }
    public function updateLoader(){
        $this->loaderMessage = 'Reviews have been received. Starting analysis...';
        
    }
    // public function loader(){
    //   $this->loaderMessage = 'Product reviews has been getting...';
        
    // }
    public function render()
    {
        return view('livewire.admin.ai.generate-reviews-component');
    }
}
