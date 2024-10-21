<?php 

namespace Nicepay\service\snap;

use Nicepay\data\model\{VirtualAccount, InquiryStatus};
use Nicepay\data\response\NicepayResponse;
use Nicepay\common\NICEPay;
use Nicepay\utils\NicepayCons;

class SnapVAService {

    public function generateVA(VirtualAccount $requestBody, string $accessToken, NICEPay $config):NicepayResponse {
        $snap = new Snap($config);
        return $snap->requestSnapTransaction($requestBody, NicepayCons::getCreateVASnapEndpoint(), $accessToken, "POST");
    }

    public function inquiryStatus(InquiryStatus $requestBody, string $accessToken, NICEPay $config):NicepayResponse {
        $snap = new Snap($config);
        return $snap->requestSnapTransaction($requestBody, NicepayCons::getInquiryStatusVAEndpoint(), $accessToken, "POST");
    }

    

    
}