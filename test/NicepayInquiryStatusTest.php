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


class NicepayInquiryStatusTest extends TestCase
{

    private $clientSecret;
    private $oldKeyFormat;
    private $iMidTest;
    private $merchantKey;

    protected function setUp(): void
    {
        $this->clientSecret = TestConst::$CLIENT_SECRET;
        $this-> iMidTest = TestConst::$IMID_TEST;
        $this-> merchantKey = TestConst::$MERCHANT_KEY;
        $this-> oldKeyFormat = TestConst::$KEY_OLD_FORMAT;
    }

    public function testInquiryStatusVASnap (){

        $timestamp = Helper::getFormattedDate();
        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey($this->oldKeyFormat)
            ->setClientSecret($this->clientSecret)
            ->setPartnerId($this -> iMidTest)
            ->setExternalID("extIDVa" . $timestamp)
            ->setTimestamp($timestamp)
            ->build();


        $parameter = InquiryStatus::builder()
            ->setPartnerServiceId("")
            ->setCustomerNo("")
            ->setVirtualAccountNo("447792631104334735")
            ->setInquiryRequestId("reqIdVA". $timestamp)
            ->setTrxId("TESTTrxId")
            ->setTxIdVA("IONPAYTEST02202408191104334735")
            ->setTotalAmount("11000.00","IDR")
            ->build();

            $accessToken = self::getAccessToken($config);
            $snapVAService = new SnapVAService();

            try {
            $response = $snapVAService->inquiryStatus($parameter, $accessToken, $config);
            } catch (NicepayError $e) {
                $this->fail("Test Failed : " . $e->getMessage());
            }

            $this->assertEquals("2002600", $response->getResponseCode());
            $this->assertEquals("Successful", $response->getResponseMessage());

    }

    // v2 

    public function testInquiryStatusVAV2 (){

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

            $this->fail("Test Inquiry Status VA V2 Failed". $e->getMessage());
        }
    }


    private function getAccessToken(NICEPay $config): string{


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
}