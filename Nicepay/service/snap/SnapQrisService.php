<?php

namespace Nicepay\service\snap;

use Nicepay\common\NICEPay;
use Nicepay\data\model\{Qris, InquiryStatus, Cancel};
use Nicepay\data\response\NicepayResponse;
use Nicepay\utils\NicepayCons;


class SnapQrisService
{


    private Snap $snap;


    public function __construct(NICEPay $config)
    {
        $this->snap = new Snap($config);
    }


    public function generateQris(Qris $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getGenerateQrisEndpoint(), $accessToken, "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getInquiryStatusQrisEndpoint(), $accessToken, "POST");
    }


    public function refund(Cancel $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getRefundQrisEndpoint(), $accessToken, "POST");
    }
}
