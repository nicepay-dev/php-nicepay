<?php

namespace Nicepay\service\snap;

use Nicepay\common\NICEPay;
use Nicepay\data\model\{Payout, InquiryStatus, Cancel};
use Nicepay\data\response\NicepayResponse;
use Nicepay\utils\NicepayCons;


class SnapPayoutService
{


    private Snap $snap;


    public function __construct(NICEPay $config)
    {
        $this->snap = new Snap($config);
    }


    public function registration(Payout $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getRegistPayoutEndpoint(), $accessToken, "POST");
    }

    public function approve(Payout $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getApprovePayoutEndpoint(), $accessToken, "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getInquiryStatusPayoutEndpoint(), $accessToken, "POST");
    }

    public function checkBalance(Payout $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getCheckBalancePayoutEndpoint(), $accessToken, "POST");
    }

    public function cancel(Cancel $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getCancelPayoutEndpoint(), $accessToken, "POST");
    }

    public function reject(Cancel $requestBody, string $accessToken): NicepayResponse
    {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getRejectPayoutEndpoint(), $accessToken, "POST");
    }
}
