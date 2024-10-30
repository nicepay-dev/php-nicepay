<?php

namespace Nicepay\common;

class HttpRequest
{
    public function __construct()
    {
        // No initialization required for cURL in constructor
    }

    /**
     * Wrapper of cURL to do API request to Nicepay API
     * @param array $headers
     * @param string $requestUrl
     * @param mixed $requestBody
     * @return mixed API response, or exception during request
     */
    public function request($headers, $requestUrl, $requestBody, $method, $isRetryFlag, $retryLimit)
    {
        $attempt = 0;
        $timeoutErrorCodes = [CURLE_OPERATION_TIMEOUTED, CURLE_COULDNT_CONNECT];
    
        do {
            $ch = curl_init();
    
            // Set URL and request method
            curl_setopt($ch, CURLOPT_URL, $requestUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    
            // Add body for applicable methods
            if (in_array(strtoupper($method), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
            }
    
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15); // Set timeout to 15 seconds
    
            // Execute request
            $response = curl_exec($ch);
    
            // Check if curl request failed (e.g., timeout)
            if (curl_errno($ch)) {
                $errorCode = curl_errno($ch);
                $errorMsg = curl_error($ch);
                curl_close($ch);
    
                // Check if it's a timeout or connection error and retry if applicable
                if ($isRetryFlag && in_array($errorCode, $timeoutErrorCodes) && $attempt < $retryLimit) {
                    $attempt++;
                    sleep(1); // Wait 1 second before retrying
                    continue;
                }
    
                // If not retryable, throw an exception
                throw new NicepayError($errorMsg);
            }
    
            // Get the HTTP response code
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
    
            // If the request was successful (HTTP 2xx), return the response as JSON
            if ($httpCode >= 200 && $httpCode < 300) {
                $jsonResponse = json_decode($response, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $jsonResponse;
                } else {
                    throw new NicepayError("Failed to parse response as JSON: " . json_last_error_msg() . "\nResponse: " . $response);
                }
            }
    
            // If HTTP 504 (Gateway Timeout), retry if applicable
            if ($isRetryFlag && $httpCode === 504 && $attempt < $retryLimit) {
                $attempt++;
                sleep(1); // Wait before retrying
                continue;
            }
    
            // Handle non-retryable HTTP errors (throwing exception with HTTP error and response body)
            $responseBody = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new NicepayError("Failed to parse response as JSON with message: " . json_last_error_msg() . "\nResponse: " . $response);
            }
    
            return $responseBody;
            // throw new NicepayError("HTTP Error $httpCode: " . print_r($responseBody, true));
        } while ($isRetryFlag && $attempt < $retryLimit);  // Ensure retry limit is correctly checked
    
        // If all retries are exhausted or no response is received
        throw new NicepayError("All retry attempts exhausted.");
    }
    
}
