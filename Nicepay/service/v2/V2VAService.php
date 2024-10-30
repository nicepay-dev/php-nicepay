<?php

namespace Nicepay\service\v2;

use Nicepay\common\NICEPay;
use Nicepay\data\model\Cancel;
use Nicepay\Data\Model\InquiryStatus;
use Nicepay\service\v2\NicepayV2;
use Nicepay\data\model\VirtualAccount;
use Nicepay\data\response\NicepayV2Response;
use Nicepay\utils\NicepayCons;

class V2VAService
{

    public function generateVA(VirtualAccount $requestBody, NICEPay $config): NicepayV2Response
    {
        $v2Service = new NicepayV2($config);
        return $v2Service->requestV2Transaction($requestBody, NicepayCons::getV2RegistrationEndpoint(), "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, NICEPay $config): NicepayV2Response
    {
        $v2Service = new NicepayV2($config);
        return $v2Service->requestV2Transaction($requestBody, NicepayCons::getV2InquiryStatusEndpoint(), "POST");
    }

    public function cancel(Cancel $requestBody, Nicepay $config): NicepayV2Response
    {
        $v2Service = new NicepayV2($config);
        return $v2Service->requestV2Transaction($requestBody, NicepayCons::getV2CancelEndpoint(), "DELETE");
    }
}
