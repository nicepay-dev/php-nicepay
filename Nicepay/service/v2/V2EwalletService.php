<?php

namespace Nicepay\service\v2;

use Nicepay\service\v2\BaseV2Service;
use Nicepay\data\response\NicepayV2Response;
use Nicepay\data\model\Ewallet;
use Nicepay\utils\NicepayCons;

class V2EwalletService extends BaseV2Service
{

    public function payment(Ewallet $requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getV2PaymentEndpoint(), "POST");
    }
}
