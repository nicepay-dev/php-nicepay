<?php

namespace Nicepay\service\snap;

use Nicepay\data\model\{VirtualAccount, InquiryStatus, Cancel};
use Nicepay\data\response\NicepayResponse;
use Nicepay\common\NICEPay;
use Nicepay\utils\NicepayCons;

class SnapVAService
{

    private Snap $snap;

    public function __construct(NICEPay $config)
    {
        $this->snap = new Snap($config);
    }

    public function generateVA(VirtualAccount $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getCreateVASnapEndpoint(), $accessToken, "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getInquiryStatusVAEndpoint(), $accessToken, "POST");
    }


    public function cancel(Cancel $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getCancelVAEndpoint(), $accessToken, "DELETE");
    }
}
