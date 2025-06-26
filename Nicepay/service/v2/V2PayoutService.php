<?php


namespace Nicepay\service\v2;


use Nicepay\common\NICEPay;
use Nicepay\data\response\NicepayV2Response;
use Nicepay\utils\NicepayCons;



class V2PayoutService
{

    protected NicepayV2 $v2Service;

    public function __construct(NICEPay $config)
    {
        $this->v2Service = new NicepayV2($config);
    }



    /*************  ✨ Windsurf Command 🌟  *************/
    /**
     * Registration API for V2
     *
     * @param mixed $requestBody The request body for registration
     * @return NicepayV2Response The response from the registration API
     */
    public function registration($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getRegistV2PayoutEndpoint(), "POST");
    }


    public function approveTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getApproveV2PayoutEndpoint(), "POST");
    }


    public function inquiryTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getInquiryStatusV2PayoutEndpoint(), "POST");
    }

    public function cancelTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getCancelV2PayoutEndpoint(), "POST");
    }

    public function rejectTransaction($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getRejectV2PayoutEndpoint(), "POST");
    }

    public function balanceInquiry($requestBody): NicepayV2Response
    {
        return $this->v2Service->requestV2Transaction($requestBody, NicepayCons::getCheckBalanceV2PayoutEndpoint(), "POST");
    }
}
