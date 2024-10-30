<?php

namespace Nicepay\utils;

class NicepayCons{

    private const SANDBOX_BASE_URL = "https://dev.nicepay.co.id/nicepay/";

    // private const SANDBOX_BASE_URL = "http://localhost:8080/nicepay/";
    private const PRODUCTION_BASE_URL = "https://www.nicepay.co.id/nicepay/";
    private const CREATE_VA_SNAP_ENDPOINT = 'api/v1.0/transfer-va/create-va';

    private const V2_REGISTRATION_ENDPOINT = "direct/v2/registration";

    private const V2_INQUIRY_ENDPOINT = "direct/v2/inquiry";

    private const INQUIRY_STATUS_VA_SNAP_ENDPOINT = "api/v1.0/transfer-va/status";

    private const CANCEL_VA_SNAP_ENDPOINT = "api/v1.0/transfer-va/delete-va";

    private const PAYMENT_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/payment-host-to-host";

    private const INQUIRY_STATUS_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/status";

    private const REFUND_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/refund";

    private const CANCEL_V2_ENDPOINT = "direct/v2/cancel";


    public static function getSandboxBaseUrl() : string{
        return self::SANDBOX_BASE_URL;
    }
    public static function getProductionBaseUrl() : string{
        return self::PRODUCTION_BASE_URL;
    }

    public static function getCreateVASnapEndpoint() : string{
        return self::CREATE_VA_SNAP_ENDPOINT;
    }

    public static function getV2RegistrationEndpoint() : string{
        return self::V2_REGISTRATION_ENDPOINT;
    }

    public static function getV2InquiryStatusEndpoint() : string{
        return self::V2_INQUIRY_ENDPOINT;
    }

    public static function getInquiryStatusVAEndpoint() {
        return self::INQUIRY_STATUS_VA_SNAP_ENDPOINT;
    }

    public static function getCancelVAEndpoint() : string{
        return self::CANCEL_VA_SNAP_ENDPOINT;
    }

    public static function getV2CancelEndpoint() {
        return self::CANCEL_V2_ENDPOINT;
    }

    public static function getPaymentEwalletEndpoint() {
        return self::PAYMENT_EWALLET_SNAP_ENDPOINT;
    }

    public static function getInquiryStatusEwalletEndpoint(){
        return self::INQUIRY_STATUS_EWALLET_SNAP_ENDPOINT;
    }

    public static function getRefundEwalletEndpoint() : string{
        return self::REFUND_EWALLET_SNAP_ENDPOINT; 
    }
    
}


