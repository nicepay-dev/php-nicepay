<?php 

namespace Nicepay\service\snap;

use Nicepay\common\NICEPay;
use Nicepay\data\model\{Ewallet, InquiryStatus, Cancel};
use Nicepay\data\response\NicepayResponse;
use Nicepay\utils\NicepayCons;


class SnapEwalletService {


    private Snap $snap;


    public function __construct(NICEPay $config) {
        $this->snap = new Snap($config);
    }


    public function paymentEwallet(Ewallet $requestBody, string $accessToken):NicepayResponse {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getPaymentEwalletEndpoint(), $accessToken, "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, string $accessToken):NicepayResponse {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getInquiryStatusEwalletEndpoint(), $accessToken, "POST");
    }


    public function refund(Cancel $requestBody, string $accessToken):NicepayResponse {
        return $this->snap->requestSnapTransaction($requestBody, NicepayCons::getRefundEwalletEndpoint(), $accessToken, "POST");
    }  


}