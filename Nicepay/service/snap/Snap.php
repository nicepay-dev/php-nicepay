<?php

namespace Nicepay\service\snap;

use Nicepay\common\{NICEPay, HttpRequest};
use Nicepay\data\response\NicepayResponse;
use Nicepay\data\model\AccessToken;
use Nicepay\utils\Helper;

/**
 * Snap object used to do request to Nicepay SNAP API
 */
class Snap
{
    private NICEPay $apiConfig;
    private $httpClient;
    private $helper;

    public function __construct(NICEPay $config)
    {
        $this->apiConfig = $config;
        $this->httpClient = new HttpRequest();
        $this->helper = new Helper();
    }


    public function requestSnapTransaction($parameter, $endPoint, $accessToken, $method): NicepayResponse
    {

        $config = $this->apiConfig;
        $jsonData = json_encode($parameter->toArray());

        $url = $this->apiConfig->getNicepayBaseUrl() . $endPoint;
        $headers = self::getHeaders($method, null, $accessToken, $jsonData, $endPoint);


        $response = $this->httpClient->request($headers, $url, $jsonData, $method, $config->isRetryFlag(), $config->getRetryCount());
        return NicepayResponse::fromArray($response);
    }


    public function requestSnapAccessToken(AccessToken $parameter): NicepayResponse
    {

        $config = $this->apiConfig;
        $url = $config->getNicepayBaseUrl() . "v1.0/access-token/b2b";

        // Prepare headers
        $headers = self::getHeaders(null, $parameter->getGrantType(), null, null, null);
        // Make the HTTP request using HttpRequest class
        $jsonData = json_encode($parameter->toArray());



        $response = $this->httpClient->request($headers, $url, $jsonData, "POST", $config->isRetryFlag(), $config->getRetryCount());

        return NicepayResponse::fromArray($response);
    }


    public function getHeaders($httpMethod, $grantType, $accessToken, $data, $endPoint): array
    {

        $headers = [];

        $partnerID = $this->apiConfig->getPartnerId();
        $privateKey = $this->apiConfig->getPrivateKey();
        $secretKey = $this->apiConfig->getClientSecret();
        $externalId = $this->apiConfig->getExternalID();
        $timeStamp = $this->apiConfig->getTimeStamp();
        $channelId = $partnerID . "01";

        if ($grantType != null) {
            $stringToSign = $this->apiConfig->getPartnerId() . "|" . $timeStamp;
            $signature = $this->helper->getSignatureAccessToken(
                Helper::getKey($privateKey),
                $stringToSign
            );

            $headers = [
                'Content-Type: application/json',
                'X-TIMESTAMP: ' . $timeStamp,
                'X-CLIENT-KEY: ' . $this->apiConfig->getPartnerId(),
                'X-SIGNATURE: ' . $signature
            ];
        } else {

            $hexPayload = $this->helper->getEncodePayload($data);
            $stringToSign = "$httpMethod:/$endPoint:$accessToken:$hexPayload:$timeStamp";

            $signature = $this->helper->getRegistSignature(
                $stringToSign,
                $secretKey
            );

            $headers = [
                'Content-Type: application/json',
                'X-TIMESTAMP: ' . $timeStamp,
                'X-SIGNATURE: ' . $signature,
                'Authorization: Bearer ' . $accessToken,
                'X-PARTNER-ID: ' . $partnerID,
                'X-EXTERNAL-ID: ' . $externalId,
                'CHANNEL-ID: ' . $channelId
            ];
        }
        return $headers;
    }
}
