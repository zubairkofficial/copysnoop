<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
class OxylabAmazon
{

    public function genUrl($product)
    {
        try {
            if (filter_var($product, FILTER_VALIDATE_URL)) {
                $url = $product;
                $pattern = '/dp\/([A-Z0-9]+)/';
                if (preg_match($pattern, $url, $matches)) {
                    $productId = $matches[1];
                    // dd($productId);
                } else {
                    throw new \Exception("Product ID not found in the URL");
                }
            } else {
                $productId = $product;
            }

            $params = [
                'source' => 'amazon_reviews',
                'domain' => 'com',
                'query' => $productId,
                'parse' => true,
                'limit' => 100,
                'pages' => 10,
            ];

            $response = Http::withBasicAuth('aslam945', 'Azzan3106473564')->withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://realtime.oxylabs.io/v1/queries', $params);
           // dd($response);
            $result = $this->handleResponse($response);
           
        

            // Now you can access specific properties from the JSON data
            $status = $result['status'];
            $message = $result['message'];
            
            if ($status == 200 && $message == 'All went well') {
              return  $reviews = [
                    'status'=>200,
                    'message'=>$message,
                    '$reviews'=>$result['data']
                ];
                
            } elseif ($status == 429 && $message == 'Too many requests') {
                return $result;
            } else {
                return $result ;
            }
            
           
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function genReveiw($reviews)
    {
        $maxTokens = 10000; // Set the maximum allowed tokens

        $prompt = "<Product Information>\n";
        // $prompt .= "Product Name: \n";
        // $prompt .= "Product Description: \n";
        // $prompt .= "</Product Information>\n";

        $prompt .= "<Reviews>\n";
        $totalTokens = count(explode(' ', $prompt)); // Count initial tokens

        foreach ($reviews as $review) {
            $reviewText = "<Review>\n";
            $reviewText .= "Client Name: " . $review['author'] . "\n";
            $reviewText .= "Client Rating: " . $review['rating'] . "\n";
            $reviewText .= "Total Rating: 5\n";
            $reviewText .= "Client Review: " . $review['content'] . "\n";
            $reviewText .= "</Review>\n";

            $reviewTokens = count(explode(' ', $reviewText));

            // Check if adding the review exceeds the limit
            if ($totalTokens + $reviewTokens > $maxTokens) {
                break; // Stop adding reviews if the limit is reached
            }

            $prompt .= $reviewText;
            $totalTokens += $reviewTokens;
        }

        return $prompt .= "</Reviews>\n";

    }

    private function handleResponse($response)
    {
        switch ($response->status()) {
            case 200:
                return $this->handleSuccess($response);
            case 202:
                return $this->handleAccepted($response);
            case 204:
                return $this->handleNoContent($response);
            case 400:
                return $this->handleBadRequest($response);
            case 401:
                return $this->handleUnauthorized($response);
            case 403:
                return $this->handleForbidden($response);
            case 404:
                return $this->handleNotFound($response);
            case 422:
                return $this->handleUnprocessableEntity($response);
            case 429:
                return $this->handleTooManyRequests($response);
            case 500:
                return $this->handleInternalServerError($response);
            case 524:
                return $this->handleTimeout($response);
            case 612:
                return $this->handleUndefinedInternalError($response);
            case 613:
                return $this->handleFaultedAfterRetries($response);
            default:
                // Handle other status codes if needed
                return response()->json(['status' => $response->status(), 'message' => 'Unexpected status code']);
        }
    }

    private function handleSuccess($response)
    {
        $result = $response->json();
        $reviews = [];

        foreach ($result["results"] as $resultItem) {
            if (isset($resultItem['content']['reviews'])) {
                $reviews = array_merge($reviews, $resultItem['content']['reviews']);
            }
        }

        $reviews = $this->genReveiw($reviews);

        return $data = ['status' => 200, 'message' => 'All went well', 'data' => $reviews];
    }
    private function handleTooManyRequests($response)
    {
        return ['status' => 429, 'message' => 'Too many requests'];
    }
    
    private function handleInternalServerError($response)
    {
        return ['status' => 500, 'message' => 'Internal server error'];
    }
    
    private function handleTimeout($response)
    {
        return ['status' => 524, 'message' => 'Timeout'];
    }
    
    private function handleUndefinedInternalError($response)
    {
        return ['status' => 612, 'message' => 'Undefined internal error'];
    }
    
    private function handleFaultedAfterRetries($response)
    {
        return ['status' => 613, 'message' => 'Faulted after too many retries'];
    }
    
    private function handleAccepted($response)
    {
        return ['status' => 202, 'message' => 'Your request was accepted'];
    }
    
    private function handleNoContent($response)
    {
        return ['status' => 204, 'message' => 'No content'];
    }
    
    private function handleBadRequest($response)
    {
        // Handle multiple error messages
        $errorMessages = $response->json(); // Assuming error messages are returned in the response
        return ['status' => 400, 'message' => 'Wrong request structure', 'errors' => $errorMessages];
    }
    
    private function handleUnauthorized($response)
    {
        return ['status' => 401, 'message' => 'Authorization header not provided / Invalid authorization header / Client not found'];
    }
    
    private function handleForbidden($response)
    {
        return ['status' => 403, 'message' => 'Forbidden'];
    }
    
    private function handleNotFound($response)
    {
        return ['status' => 404, 'message' => 'Not found'];
    }
    
    private function handleUnprocessableEntity($response)
    {
        return ['status' => 422, 'message' => 'Unprocessable entity'];
    }
    

   
}
