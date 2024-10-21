# PHP - NICEPAY

NICEPAY ❤️PHP!

This is the Official PHP API client/library for NICEPAY Payment API. Visit [PHP Library](https://github.com/nicepay-dev/java-nicepay). 
More information about the product and see documentation at [NICEPAY Docs](https://docs.nicepay.co.id/) for more technical details.
This library provides access to Nicepay BI SNAP APIs.

This library currently supports the following payment methods:

### SNAP Version:
- **Snap**
    - Get Access Token
- **Virtual Account**:
    - Generate Virtual Account
    - Inquiry Status


### V2 Version:
- **Virtual Account**:
    - Generate Virtual Account
    - Inquiry Status

## 1. Installation
### 1.1 Manual Install
You can clone or [download](https://github.com/nicepay-dev/nicepay-php) our source code, then import the folder manually into your project.


## 2. Usage

### 2.1 Client Initialization and Configuration
Get your Credentials from [Nicepay Dashboard](https://bo.nicepay.co.id/)
Initialize Nicepay Config
> **WARNING:** Credentials used here are for testing purposes only.

```php 

$timestamp = Helper::getFormattedDate();

$config = NICEPay::builder()
            ->setIsProduction(false) // 
            ->setPrivateKey('MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAInJe1G22R2fMchIE6BjtYRqyMj6lurP/zq6vy79WaiGKt0Fxs4q3Ab4ifmOXd97ynS5f0JRfIqakXDcV/e2rx9bFdsS2HORY7o5At7D5E3tkyNM9smI/7dk8d3O0fyeZyrmPMySghzgkR3oMEDW1TCD5q63Hh/oq0LKZ/4Jjcb9AgMBAAECgYA4Boz2NPsjaE+9uFECrohoR2NNFVe4Msr8/mIuoSWLuMJFDMxBmHvO+dBggNr6vEMeIy7zsF6LnT32PiImv0mFRY5fRD5iLAAlIdh8ux9NXDIHgyera/PW4nyMaz2uC67MRm7uhCTKfDAJK7LXqrNVDlIBFdweH5uzmrPBn77foQJBAMPCnCzR9vIfqbk7gQaA0hVnXL3qBQPMmHaeIk0BMAfXTVq37PUfryo+80XXgEP1mN/e7f10GDUPFiVw6Wfwz38CQQC0L+xoxraftGnwFcVN1cK/MwqGS+DYNXnddo7Hu3+RShUjCz5E5NzVWH5yHu0E0Zt3sdYD2t7u7HSr9wn96OeDAkEApzB6eb0JD1kDd3PeilNTGXyhtIE9rzT5sbT0zpeJEelL44LaGa/pxkblNm0K2v/ShMC8uY6Bbi9oVqnMbj04uQJAJDIgTmfkla5bPZRR/zG6nkf1jEa/0w7i/R7szaiXlqsIFfMTPimvRtgxBmG6ASbOETxTHpEgCWTMhyLoCe54WwJATmPDSXk4APUQNvX5rr5OSfGWEOo67cKBvp5Wst+tpvc6AbIJeiRFlKF4fXYTb6HtiuulgwQNePuvlzlt2Q8hqQ==')
            ->setClientSecret('33F49GnCMS1mFYlGXisbUDzVf2ATWCl9k3R++d5hDd3Frmuos/XLx8XhXpe+LDYAbpGKZYSwtlyyLOtS/8aD7A==')
            ->setPartnerId('IONPAYTEST')
            ->setExternalID("randUniqueId1234")
            ->setTimestamp($timestamp)
            ->isRetryFlag(true) // default false
            ->setRetryCount(4) // default 1
            ->build();
```

### 2.2 Featured services 


### 2.2.1 Snap Version

Snap is Nicepay existing tool to help merchant charge customers using a mobile-friendly, in-page,
no-redirect checkout facilities. [Using snap is simple](https://docs.Nicepay.com/en/snap/overview).

Available methods for Snap

#### 2.2.1.1 Get Access Token

```php

        $tokenBody = AccessToken::builder()
            ->setGrantType('client_credentials')
            ->setAdditionalInfo([])
            ->build();

        $snap = new Snap($config); // check 2.1 to set up $config

        try {
            $response = $snap->requestSnapAccessToken($tokenBody);

            // Get access token
            $accessToken = $response->getAccessToken();  

        } catch (NicepayError $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

```

#### 2.2.1.2 Generate VA

```php

$parameter = VirtualAccount::builder()
            ->setPartnerServiceId("")
            ->setCustomerNo("")
            ->setVirtualAccountNo("")
            ->setVirtualAccountName("Nicepay PHP Test")
            ->setTrxId("ordNo" . $timestamp)
            ->setTotalAmount('10000.00', 'IDR')
            ->setAdditionalInfo([
                'bankCd' => 'BMRI',     
                'goodsNm' => 'Test',
                'dbProcessUrl' => 'https://nicepay.co.id/',
            ])
            ->build();


        $accessToken = ""; // Check 2.2.1.1 for step to get access token
        $snapVAService = new SnapVAService();

        try {
        $response = $snapVAService->generateVA($parameter, $accessToken, $config);
        } catch (NicepayError $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }

```
### 2.2.2 Non-Snap Version (V2)

#### 2.2.2.1 Generate VA

```php

$timestamp = Helper::getFormattedTimestampV2();
        
        $config = NICEPay::builder()
            ->setIsProduction(false)
            ->setRetryFlag(true) 
            ->setRetryCount(4) 
            ->build();

        $reffNo = "ordNo".$timestamp;
        $amount = "100";
        $virtualAccountBuilder = VirtualAccount::builder();

        // For Merchant token setter the args is (TIMESTAMP, IMID, REFFNO, AMOUNT, MERCHANT_KEY)
        $parameter = $virtualAccountBuilder
            ->setTimeStamp($timestamp)
            ->setIMid("IONPAYTEST")
            ->setPayMethod("02")
            ->setCurrency("IDR")
            ->setBankCd("CENA")
            ->setAmt("100")
            ->setReferenceNo($reffNo)
            ->setMerchantToken($timestamp, "IONPAYTEST", $reffNo, $amount, "")
            ->setVacctValidDt("20251004")
            ->setVacctValidTm("101010")
            ->setMerFixAcctId("")
            ->setDbProcessUrl("https://webhook.site/7c2d47f6-557b-4b85-b91a-ad3b6182b10c")
            ->setGoodsNm("Test VA V2 PHP")
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

        } catch (NicepayError $e) {
            $this->assertTrue(true, "Exmessage: ception thrown: " . $e->getMessage());
        }

```
## 3. Examples

Integration test are available

- [Virtual Account Sample Functional Test](test/NicepayVirtualAccountTest.php)
- [Inquiry Status Sample Functional Test](test/NicepayInquiryStatusTest.php)

## Get help

- [Nicepay Docs](https://docs.nicepay.co.id/)
- [Nicepay Dashboard ](https://bo.nicepay.co.id/)
- [SNAP documentation](http://snap-docs.Nicepay.com)
- Can't find answer you looking for? email to [cs@nicepay.co.id](mailto:cs@nicepay.co.id)







