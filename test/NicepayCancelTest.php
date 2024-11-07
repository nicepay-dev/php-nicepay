<?php

use Nicepay\common\NICEPay;
use Nicepay\common\NicepayError;
use Nicepay\data\model\{AccessToken, Cancel, VirtualAccount, Payout};
use Nicepay\data\response\NicepayResponse;
use Nicepay\service\snap\{Snap, SnapQrisService, SnapVAService, SnapPayoutService, SnapEwalletService};
use Nicepay\service\v2\V2VAService;
use Nicepay\utils\Helper;
use test\TestConst;
use PHPUnit\Framework\TestCase;

class NicepayCancelTest extends TestCase
{

    private $configSnap;

    private $configV2;
    private $configEwallet;
    private $timestamp;
    private $timestampv2;
    private $iMid;
    private $amount;
    private $merchantKey;



    public function setUp(): void
    {

        $this->timestamp = Helper::getFormattedDate();
        $this->timestampv2 = Helper::getFormattedTimestampV2();
        $this->amount = "10000";
        $this->iMid = TestConst::$NORMALTEST;
        $this->merchantKey = TestConst::$MERCHANT_KEY;

        $this->configSnap = NICEPay::builder()
            ->setIsProduction(false)
            ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
            ->setPartnerId($this->iMid)
            ->setExternalID("ExtIdCancel" . $this->timestamp)
            ->setTimestamp($this->timestamp)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->build();

        $this->configV2 = Nicepay::builder()
            ->setIsProduction(false)
            ->build();

        $this->configEwallet = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->setClientSecret(TestConst::$CLIENT_SECRET_EW)
            ->setPartnerId(TestConst::$IMID_EW)
            ->setExternalID("extIdCew" . $this->timestamp)
            ->setTimestamp($this->timestamp)
            ->build();
    }

    public function getAccessToken($config)
    {

        // $config = $this -> configSnap;
        $request = AccessToken::builder()
            ->setGrantType("client_credentials")
            ->setAdditionalInfo([])
            ->build();

        $snap = new Snap($config);
        $response = $snap->requestSnapAccessToken($request);

        return $response->getAccessToken();
    }


    public function testCancelSnap()
    {

        $config = $this->configSnap;
        $accessToken = $this->getAccessToken($config);

        $sampleVA = $this->generateNewVA();
        $txId = $sampleVA->getTXid();
        $reffNo = $sampleVA->getReferenceNo();
        $vacctNo = $sampleVA->getVacctNo();

        $requestData = Cancel::builder()
            ->setPartnerServiceId("")
            ->setCustomerNo("")
            ->setVirtualAccountNo($vacctNo)
            ->setTotalAmount("10000.00", "IDR")
            ->setTrxId($reffNo)
            ->settxIdVA($txId)
            ->setCancelMessage("test Cancel Snap")
            ->build();

        try {

            $snapVAService = new SnapVAService($config);
            $response = $snapVAService->cancel($requestData, $accessToken);

            $this->assertEquals("2003100", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
        } catch (Exception $e) {
            $this->fail("Test cancel snap failed! exception thrown : " . $e->getMessage());
        }
    }


    public function testCancelV2()
    {

        $config = $this->configV2;
        $timestamp = Helper::getFormattedTimestampV2();
        $sampleVA = $this->generateNewVA();
        $txId = $sampleVA->getTXid();
        $reffNo = $sampleVA->getReferenceNo();

        $requestBody = Cancel::builder()
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMid)
            ->setTXid($txId)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMid, $txId, $this->amount, $this->merchantKey)
            ->setPayMethod("02")
            ->setCancelType("1")
            ->setAmt($this->amount)
            ->build();

        try {

            $v2VaService = new V2VAService();
            $response = $v2VaService->cancel($requestBody, $config);

            $this->assertEquals("0000", $response->getResultCd());
            $this->assertEquals("SUCCESS", $response->getResultMsg());
        } catch (Exception $e) {
            $this->fail("Test cancel V2 failed! exception thrown : " . $e->getMessage());
        }
    }

    public function testRefundEwalletSnap()
    {

        $config = $this->configEwallet;

        $requestBody = Cancel::builder()
            ->setMerchantId($config->getPartnerId())
            ->setSubMerchantId("23489182303312")
            ->setOriginalPartnerReferenceNo("RefnoTrx20241025102223") // Update with new paid transaction before test
            ->setOriginalReferenceNo("TNICEEW05105202410251022245965")  // Update with new paid transaction before test
            ->setPartnerRefundNo("partnerRef05202410291359517089")
            ->setRefundAmount("100.00", "IDR")
            ->setExternalStoreId("239840198240795109")
            ->setReason("test refund")
            ->setRefundType("1")
            ->build();


        $accessToken = self::getAccessToken($config);
        $snapEwalletService = new SnapEwalletService($config);

        try {
            $response = $snapEwalletService->refund($requestBody, $accessToken);

            $this->assertEquals("2005800", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
        } catch (Exception $e) {
            $this->fail("Refund Snap Ewallet failed, exception thrown : " . $e->getMessage());
        }
    }

    public function testRefundQrisSnap()
    {

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->setClientSecret(TestConst::$CLIENT_SECRET_QRIS)
            ->setPartnerId(TestConst::$IMID_QRIS)
            ->setExternalID("extIDRq" . $this->timestamp)
            ->setTimestamp($this->timestamp)
            ->build();

        $requestBody = Cancel::builder()
            ->setOriginalReferenceNo("TNICEQR08100202411011308333291")
            ->setOriginalPartnerReferenceNo("OrdNo-20241101130833")
            ->setPartnerRefundNo("canQrisPhpNative" . $this->timestampv2)
            ->setMerchantId(TestConst::$IMID_QRIS)
            ->setExternalStoreId("NicepayStoreID1")
            ->setRefundAmount("1000.00", "IDR")
            ->setReason("Test Refund Qris PHP Native")
            ->setAdditionalInfo(
                ["cancelType" => "1"]
            )
            ->build();

        $accessToken = self::getAccessToken($config);

        $qrisService = new SnapQrisService($config);

        try {

            $response = $qrisService->refund($requestBody, $accessToken);

            $this->assertEquals("Successful", $response->getResponseMessage(), "Expecting Successful, got actual " . $response->getResponseMessage());
            $this->assertEquals("2007800", $response->getResponseCode(), "Expecting 2007800, got actual " . $response->getResponseCode());
        } catch (Exception $e) {
            $this->fail("Refund Qris Snap Test Failed, Exception thrown : " . $e->getMessage());
        }
    }

    public function testRejectPayoutSnap()
    {

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
            ->setPartnerId(TestConst::$NORMALTEST)
            ->setExternalID("rejctPO" . Helper::getFormattedTimestampV2())
            ->setTimestamp($this->timestamp)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->build();

        $accessToken = self::getAccessToken($config);
        $payOutData = self::registNewPayout($accessToken);

        
        $requestBody = Cancel::builder()
            ->setMerchantId(TestConst::$NORMALTEST)
            ->setOriginalReferenceNo($payOutData->getOriginalReferenceNo())
            ->setOriginalPartnerReferenceNo($payOutData->getPartnerReferenceNo())
            ->build();

        $payoutService = new SnapPayoutService($config);

        try {

            $response = $payoutService->reject($requestBody, $accessToken);

            $this->assertEquals("Successful", $response->getResponseMessage(), "Expecting Successful, got actual " . $response->getResponseMessage());
            $this->assertEquals("2000000", $response->getResponseCode(), "Expecting 2000000, got actual " . $response->getResponseCode());
        } catch (Exception $e) {
            $this->fail("Refund Qris Snap Test Failed, Exception thrown : " . $e->getMessage());
        }
    }


    public function testCancelPayoutSnap()
    {

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
            ->setPartnerId(TestConst::$NORMALTEST)
            ->setExternalID("rejctPO" . Helper::getFormattedTimestampV2())
            ->setTimestamp($this->timestamp)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->build();

        $accessToken = self::getAccessToken($config);

        // Create new
        $registPayout = self::registNewPayout($accessToken);
        // Approve data 
        self::approvePayoutSnap($registPayout, $accessToken);

        $requestBody = Cancel::builder()
            ->setMerchantId(TestConst::$NORMALTEST)
            ->setOriginalReferenceNo($registPayout->getOriginalReferenceNo())
            ->setOriginalPartnerReferenceNo($registPayout->getPartnerReferenceNo())
            ->build();

        $payoutService = new SnapPayoutService($config);

        try {

            $response = $payoutService->cancel($requestBody, $accessToken);

            $this->assertEquals("Successful", $response->getResponseMessage(), "Expecting Successful, got actual " . $response->getResponseMessage());
            $this->assertEquals("2000000", $response->getResponseCode(), "Expecting 2000000, got actual " . $response->getResponseCode());
        } catch (Exception $e) {
            $this->fail("Refund Payout Snap Test Failed, Exception thrown : " . $e->getMessage());
        }
    }


    private function approvePayoutSnap(NicepayResponse $payoutData, $accessToken){

        $config = NICEPay::builder()
        ->setIsProduction(false)
        ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
        ->setPartnerId(TestConst::$NORMALTEST)
        ->setExternalID("approvePOc" . Helper::getFormattedTimestampV2())
        ->setTimestamp($this->timestamp)
        ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
        ->build();;
        
        $requestBody = Payout::builder()
        -> merchantId(TestConst::$NORMALTEST)
        -> originalReferenceNo($payoutData -> getOriginalReferenceNo())
        -> originalPartnerReferenceNo($payoutData -> getPartnerReferenceNo())
        -> build();

        try {
            $payoutService = new SnapPayoutService($config);
            $response = $payoutService -> approve($requestBody, $accessToken);
            
        } catch (Exception $e){
            throw new NicepayError("Failed test registration failed , exception thrown :".$e->getMessage());
        }
    }

    private function registNewPayout($accessToken)
    {

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
            ->setPartnerId(TestConst::$NORMALTEST)
            ->setExternalID("RegPO" . Helper::getFormattedTimestampV2())
            ->setTimestamp($this->timestamp)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->build();

        $requestBody = Payout::builder()
            ->merchantId(TestConst::$NORMALTEST)
            ->beneficiaryAccountNo("1040004380536")
            ->beneficiaryName("Test PHP Native")
            ->beneficiaryPhone("08123456789")
            ->beneficiaryCustomerResidence("1")
            ->beneficiaryCustomerType("1")
            ->beneficiaryPostalCode("123456")
            ->payoutMethod('0')
            ->beneficiaryBankCode('CENA')
            ->amount("10000.00", "IDR")
            ->partnerReferenceNo("ordRefP" . Helper::getFormattedTimestampV2())
            ->description("Test Regist Payour PHP Native")
            ->deliveryName("Ciki")
            ->deliveryId('1234567890234512')
            ->reservedDt("20241104")
            ->reservedTm('215334')
            ->build();

        $payoutService = new SnapPayoutService($config);
        $response = $payoutService->registration($requestBody, $accessToken);
        
        return $response;
    }

    public function generateNewVA()
    {

        $timestamp = Helper::getFormattedTimestampV2();
        $config = $this->configV2;

        $reffNo = "ordNo" . $timestamp;

        $parameter = VirtualAccount::builder()
            ->setTimeStamp($timestamp)
            ->setIMid($this->iMid)
            ->setPayMethod("02")
            ->setCurrency("IDR")
            ->setBankCd("CENA")
            ->setAmt($this->amount)
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, $this->iMid, $reffNo, $this->amount, $this->merchantKey)
            ->setVacctValidDt("20251004")
            ->setVacctValidTm("101010")
            ->setMerFixAcctId("")
            ->setDbProcessUrl("https://webhook.site/7c2d47f6-557b-4b85-b91a-ad3b6182b10c")
            ->setGoodsNm("GENERATE FOR CANCEL TEST")
            ->setCartData("{}")
            ->setBillingNm("Nicepay php native")
            ->setBillingPhone("081534567890")
            ->setBillingEmail("nicepay@example.com")
            ->setBillingAddr("Jln. Raya Kasablanka Kav.88")
            ->setBillingCity("South Jakarta")
            ->setBillingState("DKI Jakarta")
            ->setBillingPostCd("15119")
            ->setBillingCountry("Indonesia")
            ->build();

        $v2VaService = new V2VAService();

        try {
            $response = $v2VaService->generateVA($parameter, $config);

            return $response;
        } catch (Exception $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }
    }
}
