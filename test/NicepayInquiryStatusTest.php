<?php

use Nicepay\service\v2\V2VAService;
use PHPUnit\Framework\TestCase;
use Nicepay\utils\Helper;
use Nicepay\common\NICEPay;
use test\TestConst;
use Nicepay\service\snap\SnapVAService;
use Nicepay\Data\Model\InquiryStatus;
use Nicepay\common\NicepayError;
use Nicepay\data\model\AccessToken;
use Nicepay\service\snap\Snap;
use Nicepay\service\snap\SnapEwalletService;
use Nicepay\service\snap\SnapQrisService;

class NicepayInquiryStatusTest extends TestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;
    private $merchantKey;

    protected function setUp(): void
    {
        $this->clientSecret = TestConst::$CLIENT_SECRET;
        $this->iMidTest = TestConst::$IMID_TEST;
        $this->merchantKey = TestConst::$MERCHANT_KEY;
        $this->oldKeyFormat = TestConst::$KEY_OLD_FORMAT;
    }

    public function testInquiryStatusVASnap()
    {

        $timestamp = Helper::getFormattedDate();
        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDVa" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();


        $parameter = InquiryStatus::builder()
            ->setPartnerServiceId("")
            ->setCustomerNo("")
            ->setVirtualAccountNo("447792631104334735")
            ->setInquiryRequestId("reqIdVA" . $timestamp)
            ->setTrxId("TESTTrxId")
            ->setTxIdVA("IONPAYTEST02202408191104334735")
            ->setTotalAmount("11000.00", "IDR")
            ->build();

        $accessToken = self::getAccessToken($config);
        $snapVAService = new SnapVAService($config);

        try {
            $response = $snapVAService->inquiryStatus($parameter, $accessToken);
        } catch (NicepayError $e) {
            $this->fail("Test Failed : " . $e->getMessage());
        }

        $this->assertEquals("2002600", $response->getResponseCode());
        $this->assertEquals("Successful", $response->getResponseMessage());
    }

    // v2 

    public function testInquiryStatusVAV2()
    {

        $timeStamp = Helper::getFormattedTimestampV2();
        $reffNo = "ordNo20241019001604";
        $amount = "100";

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->build();

        $parameter = InquiryStatus::builder()
            ->setTimeStamp($timeStamp)
            ->setTxId("IONPAYTEST02202410190016031872")
            ->setIMid($this->iMidTest)
            ->setMerchantToken($timeStamp, $this->iMidTest, $reffNo, $amount, $this->merchantKey)
            ->setReferenceNo($reffNo)
            ->setAmt($amount)
            ->build();

        try {

            $v2VaService = new V2VAService();

            $response = $v2VaService->inquiryStatus($parameter, $config);

            $this->assertEquals("0000", $response->getResultCd());
        } catch (NicepayError $e) {

            $this->fail("Test Inquiry Status VA V2 Failed" . $e->getMessage());
        }
    }


    private function getAccessToken(NICEPay $config): string
    {


        $tokenBody = AccessToken::builder()
            ->setGrantType('client_credentials')
            ->setAdditionalInfo([])
            ->build();

        $snap = new Snap($config);


        try {
            $response = $snap->requestSnapAccessToken($tokenBody);
        } catch (NicepayError $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

        return $response->getAccessToken();
    }


    //  EWALLET SNAP 

    public function testInquiryStatusEwalletSnap()
    {

        $timestamp = Helper::getFormattedDate();
        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this->iMidTest)
            ->setExternalID("extIDEwallet" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $accessToken = self::getAccessToken($config);
        $requestBody = InquiryStatus::builder()
            ->setMerchantId(TestConst::$IMID_TEST)
            ->setSubMerchantId("23489182303312")
            ->setOriginalPartnerReferenceNo("ref202305081205331683522921")
            ->setOriginalReferenceNO("IONPAYTEST05202408221416277395")
            ->setServiceCode(54)
            ->setTransactionDate($timestamp)
            ->setExternalStoreId("239840198240795109")
            ->setAmount("1.00", "IDR")
            ->setAdditionalInfo([])
            ->build();

        $snapEwalletService = new SnapEwalletService($config);

        try {
            $response = $snapEwalletService->inquiryStatus($requestBody, $accessToken);

            $this->assertEquals("2005500", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
        } catch (Exception $e) {
            $this->fail("Inquiry Status Snap Ewallet failed. error thrown : " . $e->getMessage());
        }
    }

    public function testInquiryStatusQris()
    {

        $timestamp = Helper::getFormattedDate();

        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret(TestConst::$CLIENT_SECRET_QRIS)
            ->setPartnerId(TestConst::$IMID_QRIS)
            ->setExternalID("extIDQris" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();

        $requestBody = InquiryStatus::builder()
            ->setOriginalReferenceNo("TNICEQR08108202404181012168473")
            ->setOriginalPartnerReferenceNo("ordNo2022120215134035")
            ->setMerchantId("TNICEQR081")
            ->setExternalStoreId("NicepayStoreID1")
            ->setServiceCode("47")
            ->build();

        $accessToken = self::getAccessToken($config);
        try {

            $qrisService = new SnapQrisService($config);
            $response = $qrisService->inquiryStatus($requestBody, $accessToken);

            $this->assertEquals("2005100", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());
        } catch (Exception $e) {
            $this->fail("Inquiry Status Qris Test Failed, exception thrown : " . $e->getMessage());
        }
    }
}
