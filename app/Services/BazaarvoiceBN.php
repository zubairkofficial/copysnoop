<?php
namespace App\Services;


use Illuminate\Support\Facades\Http;
class BazaarvoiceBN {
   

    public function bN($product){
        try {
            $prod = $product;
            $productId = $this->getProductIdFromUrl($prod);
    
            $apiUrl = $this->buildApiUrl($productId);
    
            $response = Http::get($apiUrl);
    
            if ($response->successful()) {
                $jsonResponse = $response->json();
                $data = $jsonResponse['BatchedResults']['q1']['Results'];
    
                // $sacrapingInstance = new Sacraping();
                // $data = $sacrapingInstance->promptGen($data);
                 return $data;
                
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    private function getProductIdFromUrl($product) {
        if (filter_var($product, FILTER_VALIDATE_URL)) {
            $url = $product;
            $parsedUrl = parse_url($url);
    
            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryParameters);
    
                if (isset($queryParameters['ean'])) {
                    return $queryParameters['ean'];
                } else {
                    throw new \Exception('Invalid query parameters');
                }
            } else {
                throw new \Exception('Query parameters not found in the URL');
            }
        } else {
            return $product;
        }
    }
    
    
    private function buildApiUrl($productId) {
        return "https://api.bazaarvoice.com/data/batch.json?passkey=caC2Xb0kazery1Vgcza74qqETLsDbclQWr3kbWiGXSvjI&apiversion=5.5&displaycode=19386_1_0-en_us&resource.q1=reviews&filter.q1=isratingsonly%3Aeq%3Afalse&filter.q1=productid%3Aeq%3A{$productId}&filter.q1=contentlocale%3Aeq%3Aen*%2Cen_US&sort.q1=relevancy%3Aa1&stats.q1=reviews&filteredstats.q1=reviews&include.q1=authors%2Cproducts%2Ccomments&filter_reviews.q1=contentlocale%3Aeq%3Aen*%2Cen_US&filter_reviewcomments.q1=contentlocale%3Aeq%3Aen*%2Cen_US&filter_comments.q1=contentlocale%3Aeq%3Aen*%2Cen_US&limit.q1=100&offset.q1=0&limit_comments.q1=3";
    }
    
    
}