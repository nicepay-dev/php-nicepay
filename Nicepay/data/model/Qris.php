<?php

namespace Nicepay\Data\Model;

class Qris
{

    private $partnerReferenceNo;
    private array $amount;
    private $merchantId;

    private $storeId;
    private $validityPeriod;
    private $additionalInfo;

    // v2

    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $referenceNo;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingCity;
    private $billingState;
    private $billingPostCd;
    private $billingCountry;
    private $dbProcessUrl;
    private $merchantToken;
    private $paymentExpDt;
    private $paymentExpTm;
    private $userIP;
    private $cartData;
    private $mitraCd;
    private $shopId;

    public function __construct(QrisBuilder $builder)
    {

        $this->partnerReferenceNo = $builder->getPartnerReferenceNo();
        $this->amount = $builder->getAmount();
        $this->merchantId = $builder->getMerchantId();
        $this->storeId = $builder->getStoreId();
        $this->validityPeriod = $builder->getValidityPeriod();
        $this->additionalInfo = $builder->getAdditionalInfo();

        // v2
        $this->timeStamp = $builder->getTimeStamp();
        $this->iMid = $builder->getIMid();
        $this->payMethod = $builder->getPayMethod();
        $this->currency = $builder->getCurrency();
        $this->amt = $builder->getAmt();
        $this->referenceNo = $builder->getReferenceNo();
        $this->goodsNm = $builder->getGoodsNm();
        $this->billingNm = $builder->getBillingNm();
        $this->billingPhone = $builder->getBillingPhone();
        $this->billingEmail = $builder->getBillingEmail();
        $this->billingCity = $builder->getBillingCity();
        $this->billingState = $builder->getBillingState();
        $this->billingPostCd = $builder->getBillingPostCd();
        $this->billingCountry = $builder->getBillingCountry();
        $this->dbProcessUrl = $builder->getDbProcessUrl();
        $this->merchantToken = $builder->getMerchantToken();
        $this->paymentExpDt = $builder->getPaymentExpDt();
        $this->paymentExpTm = $builder->getPaymentExpTm();
        $this->userIP = $builder->getUserIP();
        $this->cartData = $builder->getCartData();
        $this->mitraCd = $builder->getMitraCd();
        $this->shopId = $builder->getShopId();
    }

    public static function builder(): QrisBuilder
    {
        return new QrisBuilder;
    }

    public function toArray(): array
    {
        return [
            "partnerReferenceNo" => $this->partnerReferenceNo,
            "merchantId" => $this->merchantId,
            "storeId" => $this->storeId,
            "validityPeriod" => $this->validityPeriod,
            "amount" => $this->amount,
            "additionalInfo" => $this->additionalInfo,
        ];
    }

    public function toArrayV2(): array
    {

        return [
            'timeStamp' => $this->timeStamp,
            'iMid' => $this->iMid,
            'payMethod' => $this->payMethod,
            'currency' => $this->currency,
            'amt' => $this->amt,
            'referenceNo' => $this->referenceNo,
            'goodsNm' => $this->goodsNm,
            'billingNm' => $this->billingNm,
            'billingPhone' => $this->billingPhone,
            'billingEmail' => $this->billingEmail,
            'billingCity' => $this->billingCity,
            'billingState' => $this->billingState,
            'billingPostCd' => $this->billingPostCd,
            'billingCountry' => $this->billingCountry,
            'dbProcessUrl' => $this->dbProcessUrl,
            'merchantToken' => $this->merchantToken,
            'cartData' => $this->cartData,
            'userIP' => $this->userIP,
            'shopId' => $this->shopId,
            'mitraCd' => $this->mitraCd,
            'paymentExpDt' => $this->paymentExpDt,
            'paymentExpTm' => $this->paymentExpTm,
        ];
    }


    // GETTER
    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }
    public function getStoreId()
    {
        return $this->storeId;
    }
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    // v2 getter

    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function getBillingPostCd()
    {
        return $this->billingPostCd;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getPaymentExpDt()
    {
        return $this->paymentExpDt;
    }

    public function getPaymentExpTm()
    {
        return $this->paymentExpTm;
    }

    public function getUserIP()
    {
        return $this->userIP;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getShopId()
    {
        return $this->shopId;
    }

    public function setMerchantToken($encodedMerchantToken)
    {
        $this->merchantToken = $encodedMerchantToken;
    }
}

class QrisBuilder
{

    private $partnerReferenceNo;
    private array $amount = [];
    private $merchantId;
    private $storeId;
    private $validityPeriod;
    private $additionalInfo;

    // V2
    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $referenceNo;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingCity;
    private $billingState;
    private $billingPostCd;
    private $billingCountry;
    private $dbProcessUrl;
    private $merchantToken;
    private $paymentExpDt;
    private $paymentExpTm;
    private $userIP;
    private $cartData;
    private $mitraCd;
    private $shopId;



    // GETTER
    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }
    public function getStoreId()
    {
        return $this->storeId;
    }
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    // v2 getter

    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function getBillingPostCd()
    {
        return $this->billingPostCd;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getPaymentExpDt()
    {
        return $this->paymentExpDt;
    }

    public function getPaymentExpTm()
    {
        return $this->paymentExpTm;
    }

    public function getUserIP()
    {
        return $this->userIP;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getShopId()
    {
        return $this->shopId;
    }



    // SETTER

    public function partnerReferenceNo($partnerReferenceNo): QrisBuilder
    {
        $this->partnerReferenceNo = $partnerReferenceNo;
        return $this;
    }

    public function amount($value, $currency): QrisBuilder
    {
        $this->amount = [
            "value" => $value,
            "currency" => $currency,
        ];
        return $this;
    }

    public function merchantId($merchantId): QrisBuilder
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    public function storeId($storeId): QrisBuilder
    {
        $this->storeId = $storeId;
        return $this;
    }

    public function validityPeriod($validityPeriod): QrisBuilder
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    // v2 setter

    public function setTimeStamp($timeStamp): QrisBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setIMid($iMid): QrisBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setPayMethod($payMethod): QrisBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setCurrency($currency): QrisBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    public function setAmt($amt): QrisBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setReferenceNo($referenceNo): QrisBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function setGoodsNm($goodsNm): QrisBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function setBillingNm($billingNm): QrisBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function setBillingPhone($billingPhone): QrisBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    public function setBillingEmail($billingEmail): QrisBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }

    public function setBillingCity($billingCity): QrisBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }


    public function setBillingState($billingState): QrisBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }

    public function setBillingPostCd($billingPostCd): QrisBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }

    public function setBillingCountry($billingCountry): QrisBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }


    public function setDbProcessUrl($dbProcessUrl): QrisBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $reffNo, $amount, $merchantKey): QrisBuilder
    {

        $this->merchantToken = $timeStamp . $iMid . $reffNo . $amount . $merchantKey;
        return $this;
    }

    public function setPaymentExpDt($paymentExpDt): QrisBuilder
    {
        $this->paymentExpDt = $paymentExpDt;
        return $this;
    }

    public function setPaymentExpTm($paymentExpTm): QrisBuilder
    {
        $this->paymentExpTm = $paymentExpTm;
        return $this;
    }

    public function setUserIP($userIP): QrisBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }

    public function setCartData($cartData): QrisBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }

    public function setMitraCd($mitraCd): QrisBuilder
    {
        $this->mitraCd = $mitraCd;
        return $this;
    }

    public function setStoreId($storeId): QrisBuilder
    {
        $this->storeId = $storeId;
        return $this;
    }

    public function setShopId($shopId): QrisBuilder
    {
        $this->shopId = $shopId;
        return $this;
    }


    public function additionalInfo(
        $goodsNm,
        $billingNm,
        $billingPhone,
        $billingEmail,
        $billingCity,
        $billingAddr,
        $billingState,
        $billingPostCd,
        $billingCountry,
        $callBackUrl,
        $dbProcessUrl,
        $userIP,
        $cartData,
        $mitraCd
    ): QrisBuilder {
        $this->additionalInfo = [
            "goodsNm" => $goodsNm,
            "billingNm" => $billingNm,
            "billingPhone" => $billingPhone,
            "billingEmail" => $billingEmail,
            "billingCity" => $billingCity,
            "billingAddr" => $billingAddr,
            "billingState" => $billingState,
            "billingPostCd" => $billingPostCd,
            "billingCountry" => $billingCountry,
            "callBackUrl" => $callBackUrl,
            "dbProcessUrl" => $dbProcessUrl,
            "userIP" => $userIP,
            "cartData" => $cartData,
            "mitraCd" => $mitraCd,
        ];
        return $this;
    }

    public function build(): Qris
    {
        return new Qris($this);
    }
}
