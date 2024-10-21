<?php

namespace Nicepay\service\v2;

use Nicepay\common\{NICEPay, HttpRequest};
use Nicepay\data\response\NicepayV2Response;
use Nicepay\utils\Helper;


class NicepayV2 {

    private NICEPay $apiConfig;
    private $httpClient;

    public function __construct(NICEPay $config) {
        $this->apiConfig = $config;
        $this->httpClient = new HttpRequest();
    }

    public function requestV2Transaction($parameter, $endPoint, $method) :NicepayV2Response {
        
        $config = $this->apiConfig;

        // generate merchantToken 
        $parameter -> setMerchantToken(Helper::generateMerchantToken($parameter->getMerchantToken()));


        $jsonData = json_encode($parameter->toArrayV2());

        $url = $this->apiConfig->getNicepayBaseUrl() . $endPoint;
        $headers = self::getHeaders();

        
        $response = $this->httpClient->request($headers, $url, $jsonData, $method, $config->isRetryFlag(), $config->getRetryCount());

        return NicepayV2Response::fromArray($response);
    }


    private function getHeaders():array {

        return [
            'Content-Type: application/json',
        ];
    }

    

    // timeStamp + iMid + refNo + amount + merchantKey
}