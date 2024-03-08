<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
class ApifyGoodReads {
    public function goodReads($product) {
        $productId = $this->getProductIdFromUrlOrDirect($product);
    
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
    
        $jsonResponse = $response->json();
        $reviews = $jsonResponse[0]['reviews']; 
    
        return $reviews;
    }
    private function getProductIdFromUrlOrDirect($product) {
        if (filter_var($product, FILTER_VALIDATE_URL)) {
            $url = $product;
            $parsedUrl = parse_url($url);
    
            if (isset($parsedUrl['path'])) {
                $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
                $lastSegment = end($pathSegments);
                if ($lastSegment !== false && strpos($lastSegment, '-') !== false) {
                    return $lastSegment;
                } else {
                    throw new \Exception('Product ID not found in the URL');
                }
            } else {
                throw new \Exception('Path not found in the URL');
            }
        } else {
            return $product;
        }
    }
    
    
}