<?php

use Nicepay\common\NICEPay;
use Nicepay\data\model\{AccessToken, Cancel, VirtualAccount};
use Nicepay\service\snap\Snap;
use Nicepay\service\snap\SnapVAService;
use Nicepay\service\v2\V2VAService;
use Nicepay\utils\Helper;
use test\TestConst;
use PHPUnit\Framework\TestCase;
use Nicepay\service\snap\SnapEwalletService;

class NicepayCancelTest extends TestCase {

    private $configSnap;

    private $configV2;
    private $configEwallet;
    private $timestamp;
    private $timestampv2;
    private $iMid;
    private $amount;
    private $merchantKey;



    public function setUp(): void {

        $this->timestamp = Helper::getFormattedDate();
        $this->timestampv2 = Helper::getFormattedTimestampV2();
        $this -> amount = "10000";
        $this -> iMid = TestConst::$NORMALTEST;
        $this -> merchantKey = TestConst::$MERCHANT_KEY;

        $this->configSnap = NICEPay::builder()
        ->setIsProduction(false)
        ->setClientSecret(TestConst::$CLIENT_SECRET_NT)
        ->setPartnerId($this->iMid)
        ->setExternalID("ExtIdCancel".$this->timestamp)
        ->setTimestamp($this->timestamp)
        ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
        ->build();

        $this -> configV2 = Nicepay::builder()
        ->setIsProduction(false)
        ->build(); 

        $this -> configEwallet = NICEPay::builder()
            ->setIsProduction(false)
            ->setPrivateKey(TestConst::$KEY_OLD_FORMAT)
            ->setClientSecret(TestConst::$CLIENT_SECRET_EW)
            ->setPartnerId(TestConst::$IMID_EW)
            ->setExternalID("extIdCew" . $this->timestamp)
            ->setTimestamp($this->timestamp)
            ->build();

    }

    public function getAccessToken($config) {

        // $config = $this -> configSnap;
        $request = AccessToken::builder()
        ->setGrantType("client_credentials")
        ->setAdditionalInfo([])
        ->build();

        $snap = new Snap($config);
        $response = $snap->requestSnapAccessToken($request);

        return $response->getAccessToken();
    }


    public function testCancelSnap() {

        $config = $this -> configSnap;
        $accessToken = $this -> getAccessToken($config);

        $sampleVA = $this->generateNewVA();
        $txId = $sampleVA -> getTXid();
        $reffNo = $sampleVA->getReferenceNo();
        $vacctNo = $sampleVA -> getVacctNo();

        $requestData = Cancel :: builder()
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
            $response = $snapVAService -> cancel($requestData, $accessToken);

            $this ->assertEquals("2003100", $response->getResponseCode());
            $this ->assertEquals("Successful", $response->getResponseMessage());

            
        } catch (Exception $e) {
            $this -> fail("Test cancel snap failed! exception thrown : ".$e->getMessage());
        }
    }


    public function testCancelV2() {

        $config = $this -> configV2;
        $timestamp = Helper::getFormattedTimestampV2();
        $sampleVA = $this->generateNewVA();
        $txId = $sampleVA -> getTXid();
        $reffNo = $sampleVA->getReferenceNo();

        $requestBody = Cancel::builder()
        ->setTimeStamp($timestamp)
        ->setIMid($this->iMid)
        ->setTXid($txId)
        ->setReferenceNo($reffNo)
        ->setMerchantToken($timestamp, $this->iMid, $txId, $this->amount, $this->merchantKey  )
        ->setPayMethod("02")
        ->setCancelType("1")
        ->setAmt($this->amount)
        ->build();

        try { 

            $v2VaService = new V2VAService();
            $response = $v2VaService -> cancel($requestBody, $config);

            $this ->assertEquals("0000", $response->getResultCd());
            $this ->assertEquals("SUCCESS", $response->getResultMsg());
        } catch (Exception $e) {
            $this -> fail("Test cancel V2 failed! exception thrown : ".$e->getMessage());
        }
    }

    public function testRefundEwalletSnap(){

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

            $this -> assertEquals("2005800", $response->getResponseCode());
            $this -> assertEquals("Successful", $response->getResponseMessage());
           
        } catch (Exception $e) {
            $this -> fail ("Refund Snap Ewallet failed, exception thrown : ".$e->getMessage());
        }
        

    }




    public function generateNewVA() {

        $timestamp = Helper::getFormattedTimestampV2();
        $config = $this->configV2;

        $reffNo = "ordNo".$timestamp;
        
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