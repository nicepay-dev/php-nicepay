<?php

namespace test;


use Nicepay\common\HttpRequest;
use PHPUnit\Framework\TestCase;
use Nicepay\utils\Helper;
use test\TestConst;


use Exception;
use Nicepay\utils\NicepayCons;
use Nicepay\common\NicepayError;

class NicepayHttpRequestsTest extends TestCase
{

    private $headers;
    private $body;
    private $requestUrl;

    protected function setUp(): void
    {
        $this->requestUrl = NicepayCons::getSandboxBaseUrl() . "v1.0/access-token/b2b";
        $this->body = [
            'grantType' => 'client_credentials',
            'additionalInfo' => []
        ];
        $this->headers = self::getHeaders("IONPAYTEST", TestConst::$KEY_OLD_FORMAT);
    }


    public function testStart()
    {
        echo "able to start test\n";
        $this->assertTrue(true, "Able to start test");
    }

    public function testHttpRequest()
    {
        $httpRequest = new HttpRequest();

        $method = "POST";
        try {
            $response = $httpRequest->request($this->headers, $this->requestUrl, json_encode($this->body), $method, false, 1);
            echo "able to http request\n";

            $this->assertEquals('2007300', $response['responseCode']);
            $this->assertEquals('Successful', $response['responseMessage']);
        } catch (Exception $e) {
            $this->fail("Exception throws : " . $e->getMessage());
        }
    }


    public function testHttpRequestWithString()
    {
        $httpRequest = new HttpRequest();

        try {
            $response = $httpRequest->request($this->headers, $this->requestUrl, json_encode($this->body), "POST", false, null);
            echo "able to http request with string\n";

            $this->assertEquals('2007300', $response['responseCode']);
            $this->assertEquals('Successful', $response['responseMessage']);

            if ($response['responseCode'] === '2007300' && $response['responseMessage'] === 'Successful') {
                echo "Test passed.\n";
            } else {
                $this->fail("Test Failed, response code : " . $response['responseCode']);
            }
        } catch (Exception $e) {
            $this->fail('Test Failed, error thrown :' . $e->getMessage());
        }
    }

    public function testTimeout()
{
    $httpRequest = new HttpRequest();

    try {
        $httpRequest->request($this->headers, "https://httpstat.us/503?sleep=15100", $this->body, "POST", false, null);

        echo "Test failed - request should have timed out.\n";
        $this->assertTrue(false, "Test failed");
    } catch (NicepayError $e) {

        if (strpos($e->getMessage(), 'timed out') !== false) {
            echo "should timeout after 15 seconds\n";
            echo "Test passed.\n";
            $this->assertTrue(true, "Test passed");
        } else {
            echo 'Error: ' . $e->getMessage() . "\n";
            echo "Test failed.\n";
            $this->assertTrue(false, "Test failed");
        }
    }
}



    public function testErrorNotFromRequest()
    {
        $httpRequest = new HttpRequest();

        try {
            $httpRequest->request([], "", [], "POST", false, null);
        } catch (Exception $e) {
            echo "able to get error not from request\n";
            if (is_string($e->getMessage())) {
                echo "Test passed.\n";
                $this->assertTrue(true, "test passed");
            } else {
                $this->assertTrue(false, "Test Failed");
            }
        }
    }

    public function getHeaders($iMid, $privateKey): array
    {

        $headers = [];
        $timeStamp = Helper::getFormattedDate();

        $stringToSign = $iMid . "|" . $timeStamp;
        $signature = Helper::getSignatureAccessToken(
            Helper::getKey($privateKey),
            $stringToSign
        );

        $headers = [
            'Content-Type: application/json',
            'X-TIMESTAMP: ' . $timeStamp,
            'X-CLIENT-KEY: ' . $iMid,
            'X-SIGNATURE: ' . $signature,
        ];


        return $headers;
    }
}
