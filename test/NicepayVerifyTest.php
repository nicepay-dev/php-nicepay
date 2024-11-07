<?php

namespace Test;

use Nicepay\utils\Helper;
use PHPUnit\Framework\TestCase;

class NicepayVerifyTest extends TestCase
{

    public function testVerifySignature()
    {

        $signatureString = "";
        $dataString = "IONPAYTEST|2024-10-08T15:33:34+07:00";
        $publicKeyString = TestConst::$PUBLIC_KEY;

        $isVerify = Helper::verifySHA256RSA($dataString, $publicKeyString, $signatureString);

        $this->assertTrue($isVerify, "Failed verify signature ");
    }
}
