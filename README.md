# NICPAY - PHP Native

This is the Official example integration NICEPAY API. Visit [here](https://github.com/nicepay-dev/nativephp-nicepay). More information about the product and see documentation at [here](https://docs.nicepay.co.id/) for more technical details.

## 1. Installation

### 1.a Manual Installation

This project require xampp to run. You can put this project in htdoc.

## 2. Usage

### 2.1 Choose Product/Method

We have one of payment that you can see the example:

- [Snap](#22A-snap) - Customizable payment popup will appear on **your web/app** (no redirection).

### 2.2 Client Initialization and Configuration

Get your clientSecret from [Nicepay Dashboard](https://bo.nicepay.co.id/)

Change secretClient on registVirutalAccount.php and NICEPAY_PRIVATE_KEY on lib/NicepayConfig.php.

registVirutalAccount.php or any transaction api file

```php
$secretClient = "33F49GnCMS1mFYlGXisbUDzVf2ATWCl9k3R++d5hDd3Frmuos/XLx8XhXpe+LDYAbpGKZYSwtlyyLOtS/8aD7A==";
```

ib/NicepayConfig.php

```php
define("NICEPAY_PRIVATE_KEY",  <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAInJe1G22R2fMchIE6BjtYRqyMj6lurP/zq6vy79WaiGKt0Fxs4q3Ab4ifmOXd97ynS5f0JRfIqakXDcV/e2rx9bFdsS2HORY7o5At7D5E3tkyNM9smI/7dk8d3O0fyeZyrmPMySghzgkR3oMEDW1TCD5q63Hh/oq0LKZ/4Jjcb9AgMBAAECgYA4Boz2NPsjaE+9uFECrohoR2NNFVe4Msr8/mIuoSWLuMJFDMxBmHvO+dBggNr6vEMeIy7zsF6LnT32PiImv0mFRY5fRD5iLAAlIdh8ux9NXDIHgyera/PW4nyMaz2uC67MRm7uhCTKfDAJK7LXqrNVDlIBFdweH5uzmrPBn77foQJBAMPCnCzR9vIfqbk7gQaA0hVnXL3qBQPMmHaeIk0BMAfXTVq37PUfryo+80XXgEP1mN/e7f10GDUPFiVw6Wfwz38CQQC0L+xoxraftGnwFcVN1cK/MwqGS+DYNXnddo7Hu3+RShUjCz5E5NzVWH5yHu0E0Zt3sdYD2t7u7HSr9wn96OeDAkEApzB6eb0JD1kDd3PeilNTGXyhtIE9rzT5sbT0zpeJEelL44LaGa/pxkblNm0K2v/ShMC8uY6Bbi9oVqnMbj04uQJAJDIgTmfkla5bPZRR/zG6nkf1jEa/0w7i/R7szaiXlqsIFfMTPimvRtgxBmG6ASbOETxTHpEgCWTMhyLoCe54WwJATmPDSXk4APUQNvX5rr5OSfGWEOo67cKBvp5Wst+tpvc6AbIJeiRFlKF4fXYTb6HtiuulgwQNePuvlzlt2Q8hqQ==
-----END RSA PRIVATE KEY-----
EOD);
```

### 2.2.A Snap

Here is example how to request with native php.

#### Get Access Token with Snap

```php
$X_CLIENT_KEY = X_CLIENT_KEY;
$requestToken = NICEPAY_REQ_ACCESS_TOKEN_URL;
date_default_timezone_set('Asia/Jakarta');
$X_TIMESTAMP = date('c');
$stringToSign = $X_CLIENT_KEY."|".$X_TIMESTAMP;

// Start encrypt data

$private_key = NICEPAY_PRIVATE_KEY;
$binary_signature = "";

$algo = "SHA256";
openssl_sign($stringToSign, $binary_signature, $private_key, $algo);

// End encrypt

$jsonData = array(
    "grantType" => "client_credentials",
    "additionalInfo" => ""
);

$jsonDataEncode = json_encode($jsonData);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $requestToken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncode);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'X-SIGNATURE: '.base64_encode($binary_signature),
    'X-CLIENT-KEY: '.$X_CLIENT_KEY,
    'X-TIMESTAMP: '.$X_TIMESTAMP
));

$output = curl_exec($ch);
$data = json_decode($output);
$accessToken = $data->accessToken;
$data = json_decode($output);
```

#### Get Virtual Account with Snap

```php
date_default_timezone_set('Asia/Jakarta');
$X_TIMESTAMP = date('c');

$authorization = "Bearer ".$_POST['accessToken'];
$channel = "chnl".rand();
$external = "ext".rand();
$partner = X_CLIENT_KEY.rand();
$secretClient = "33F49GnCMS1mFYlGXisbUDzVf2ATWCl9k3R++d5hDd3Frmuos/XLx8XhXpe+LDYAbpGKZYSwtlyyLOtS/8aD7A==";
$body = '{"partnerServiceId":"","customerNo":"","virtualAccountNo":"","virtualAccountName":"John Doe","trxId":"2022020100000000000001","totalAmount":{"value":"10000.00","currency":"IDR"},"additionalInfo":{"bankCd":"BMRI","goodsNm":"John Doe","dbProcessUrl": "https://nicepay.co.id/","vacctValidDt":"","vacctValidTm":"","msId":"","msFee":"","msFeeType":"","mbFee":"","mbFeeType":""}}';
$hashBody = strtolower(hash("SHA256", $body));

$stirgSign = "POST:/api/v1.0/transfer-va/create-va:".$_POST['accessToken'].":".$hashBody.":".$X_TIMESTAMP;
$bodyHasing = hash_hmac("sha512", $stirgSign, $secretClient, true);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, NICEPAY_GENERATE_VA_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'X-SIGNATURE: '.base64_encode($bodyHasing),
    'X-CLIENT-KEY: '.$X_CLIENT_KEY,
    'X-TIMESTAMP: '.$X_TIMESTAMP,
    'Authorization: '.$authorization,
    'CHANNEL-ID: '.$channel,
    'X-EXTERNAL-ID: '.$external,
    'X-PARTNER-ID: '.$X_CLIENT_KEY
));

$output = curl_exec($ch);
$data = json_decode($output);
```

## Get help

- [NICEPAY Docs](https://docs.nicepay.co.id/)
- [NICEPAY Dashboard ](https://bo.nicepay.co.id/)
- [SNAP documentation]()
- Can't find answer you looking for? email to [cs@nicepay.co.id](mailto:cs@nicepay.co.id)

## Documentation

[Documentation](https://docs.nicepay.co.id/)
