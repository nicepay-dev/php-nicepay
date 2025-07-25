<?php

namespace Nicepay\utils;

class NicepayCons
{

    private const SANDBOX_BASE_URL = "https://dev.nicepay.co.id/nicepay/";
    private const PRODUCTION_BASE_URL = "https://www.nicepay.co.id/nicepay/";
    private const CREATE_VA_SNAP_ENDPOINT = 'api/v1.0/transfer-va/create-va';

    private const CLOUD_SANDBOX_BASE_URL = "https://dev-services.nicepay.co.id/nicepay/";
    private const CLOUD_PRODUCTION_BASE_URL = "https://services.nicepay.co.id/nicepay/";

    private const V2_REGISTRATION_ENDPOINT = "direct/v2/registration";

    private const V2_REDIRECT_REGISTRATION_ENDPOINT = "redirect/v2/registration";

    private const V2_INQUIRY_ENDPOINT = "direct/v2/inquiry";

    private const INQUIRY_STATUS_VA_SNAP_ENDPOINT = "api/v1.0/transfer-va/status";

    private const CANCEL_VA_SNAP_ENDPOINT = "api/v1.0/transfer-va/delete-va";

    private const PAYMENT_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/payment-host-to-host";

    private const INQUIRY_STATUS_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/status";

    private const REFUND_EWALLET_SNAP_ENDPOINT = "api/v1.0/debit/refund";

    private const CANCEL_V2_ENDPOINT = "direct/v2/cancel";
    private const PAYMENT_V2_ENDPOINT = "direct/v2/payment";

    private const GENERATE_QRIS_ENDPOINT = "api/v1.0/qr/qr-mpm-generate";
    private const INQUIRY_STATUS_QRIS_ENDPOINT = "api/v1.0/qr/qr-mpm-query";
    private const REFUND_QRIS_ENDPOINT = "api/v1.0/qr/qr-mpm-refund";

    private const REGIST_PAYOUT_ENDPOINT = "api/v1.0/transfer/registration";
    private const CHECK_BALANCE_PAYOUT_ENDPOINT = "api/v1.0/balance-inquiry";
    private const INQUIRY_STATUS_PAYOUT_ENDPOINT = "api/v1.0/transfer/inquiry";
    private const CANCEL_PAYOUT_ENDPOINT = "api/v1.0/transfer/cancel";

    private const APPROVE_PAYOUT_ENDPOINT = "api/v1.0/transfer/approve";
    private const REJECT_PAYOUT_ENDPOINT = "api/v1.0/transfer/reject";

    private const REGIST_PAYOUT_V2_ENDPOINT = "api/direct/v2/requestPayout";
    private const STATUS_INQUIRY_PAYOUT_V2_ENDPOINT = "api/direct/v2/inquiryPayout";

    private const CANCEL_PAYOUT_V2_ENDPOINT = "api/direct/v2/cancelPayout";
    private const APPROVE_PAYOUT_V2_ENDPOINT = "api/direct/v2/approvePayout";
    private const REJECT_PAYOUT_V2_ENDPOINT = "api/direct/v2/rejectPayout";

    private const BALANCE_INQUIRY_PAYOUT_V2_ENDPOINT = "api/direct/v2/balanceInquiry";


    public static function getSandboxBaseUrl(): string
    {
        return self::SANDBOX_BASE_URL;
    }
    public static function getProductionBaseUrl(): string
    {
        return self::PRODUCTION_BASE_URL;
    }

    public static function getSandboxCloud(): string
    {
        return self::CLOUD_SANDBOX_BASE_URL;
    }
    public static function getProductionCloud(): string
    {
        return self::CLOUD_PRODUCTION_BASE_URL;
    }

    public static function getCreateVASnapEndpoint(): string
    {
        return self::CREATE_VA_SNAP_ENDPOINT;
    }

    public static function getV2RegistrationEndpoint(): string
    {
        return self::V2_REGISTRATION_ENDPOINT;
    }

    public static function getV2InquiryStatusEndpoint(): string
    {
        return self::V2_INQUIRY_ENDPOINT;
    }

    public static function getInquiryStatusVAEndpoint()
    {
        return self::INQUIRY_STATUS_VA_SNAP_ENDPOINT;
    }

    public static function getV2RegistrationRedirectEndpoint(): string
    {
        return self::V2_REDIRECT_REGISTRATION_ENDPOINT;
    }

    public static function getCancelVAEndpoint(): string
    {
        return self::CANCEL_VA_SNAP_ENDPOINT;
    }

    public static function getV2CancelEndpoint()
    {
        return self::CANCEL_V2_ENDPOINT;
    }

    public static function getV2PaymentEndpoint()
    {
        return self::PAYMENT_V2_ENDPOINT;
    }

    public static function getPaymentEwalletEndpoint()
    {
        return self::PAYMENT_EWALLET_SNAP_ENDPOINT;
    }

    public static function getInquiryStatusEwalletEndpoint()
    {
        return self::INQUIRY_STATUS_EWALLET_SNAP_ENDPOINT;
    }

    public static function getRefundEwalletEndpoint(): string
    {
        return self::REFUND_EWALLET_SNAP_ENDPOINT;
    }

    public static function getGenerateQrisEndpoint(): string
    {
        return self::GENERATE_QRIS_ENDPOINT;
    }

    public static function getInquiryStatusQrisEndpoint(): string
    {
        return self::INQUIRY_STATUS_QRIS_ENDPOINT;
    }

    public static function getRefundQrisEndpoint(): string
    {
        return self::REFUND_QRIS_ENDPOINT;
    }

    public static function getRegistPayoutEndpoint()
    {
        return self::REGIST_PAYOUT_ENDPOINT;
    }

    public static function getApprovePayoutEndpoint()
    {
        return self::APPROVE_PAYOUT_ENDPOINT;
    }

    public static function getInquiryStatusPayoutEndpoint()
    {
        return self::INQUIRY_STATUS_PAYOUT_ENDPOINT;
    }

    public static function getCheckBalancePayoutEndpoint()
    {
        return self::CHECK_BALANCE_PAYOUT_ENDPOINT;
    }

    public static function getCancelPayoutEndpoint()
    {
        return self::CANCEL_PAYOUT_ENDPOINT;
    }

    public static function getRejectPayoutEndpoint()
    {
        return self::REJECT_PAYOUT_ENDPOINT;
    }

    public static function getRegistV2PayoutEndpoint()
    {
        return self::REGIST_PAYOUT_V2_ENDPOINT;
    }

    public static function getApproveV2PayoutEndpoint()
    {
        return self::APPROVE_PAYOUT_V2_ENDPOINT;
    }

    public static function getInquiryStatusV2PayoutEndpoint()
    {
        return self::STATUS_INQUIRY_PAYOUT_V2_ENDPOINT;
    }

    public static function getCheckBalanceV2PayoutEndpoint()
    {
        return self::BALANCE_INQUIRY_PAYOUT_V2_ENDPOINT;
    }

    public static function getCancelV2PayoutEndpoint()
    {
        return self::CANCEL_PAYOUT_V2_ENDPOINT;
    }

    public static function getRejectV2PayoutEndpoint()
    {
        return self::REJECT_PAYOUT_V2_ENDPOINT;
    }
}
