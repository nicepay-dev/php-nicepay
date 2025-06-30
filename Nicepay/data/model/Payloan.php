<?php

namespace Nicepay\data\model;

class Payloan
{

    private  $timeStamp;
    private  $iMid;
    private  $payMethod;
    private  $currency;
    private  $amt;
    private  $referenceNo;
    private  $goodsNm;
    private  $billingNm;
    private  $billingPhone;
    private  $billingEmail;
    private  $billingAddr;
    private  $billingCity;
    private  $billingState;
    private  $billingPostCd;
    private  $billingCountry;
    private  $deliveryNm;
    private  $deliveryPhone;
    private  $deliveryAddr;
    private  $deliveryCity;
    private  $deliveryState;
    private  $deliveryPostCd;
    private  $deliveryCountry;
    private  $dbProcessUrl;
    private  $description;
    private  $merchantToken;
    private  $reqDomain;
    private  $reqServerIP;
    private  $reqClientVer;
    private  $userIP;
    private  $userSessionID;
    private  $userAgent;
    private  $userLanguage;
    private  $cartData;
    private  $sellers;
    private  $instmntType;
    private  $instmntMon;
    private  $mitraCd;

    private  $payValidDt;
    private  $payValidTm;

    function __construct(PayloanBuilder $builder)
    {
        // V2
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
        $this->billingAddr = $builder->getBillingAddr();
        $this->billingCity = $builder->getBillingCity();
        $this->billingState = $builder->getBillingState();
        $this->billingPostCd = $builder->getBillingPostCd();
        $this->billingCountry = $builder->getBillingCountry();
        $this->dbProcessUrl = $builder->getDbProcessUrl();
        $this->merchantToken = $builder->getMerchantToken();

        // Additional fields
        $this->cartData = $builder->getCartData();
        $this->deliveryNm = $builder->getDeliveryNm();
        $this->deliveryPhone = $builder->getDeliveryPhone();
        $this->deliveryAddr = $builder->getDeliveryAddr();
        $this->deliveryCity = $builder->getDeliveryCity();
        $this->deliveryState = $builder->getDeliveryState();
        $this->deliveryPostCd = $builder->getDeliveryPostCd();
        $this->deliveryCountry = $builder->getDeliveryCountry();
        $this->description = $builder->getDescription();
        $this->reqDomain = $builder->getReqDomain();
        $this->reqServerIP = $builder->getReqServerIP();
        $this->userIP = $builder->getUserIP();
        $this->userSessionID = $builder->getUserSessionID();
        $this->userAgent = $builder->getUserAgent();
        $this->userLanguage = $builder->getUserLanguage();

        $this->reqClientVer = $builder->getReqClientVer();
        $this->sellers = $builder->getSellers();
        $this->mitraCd = $builder->getMitraCd();
        $this->instmntType = $builder->getInstmntType();
        $this->instmntMon = $builder->getInstmntMon();

        $this->payValidDt = $builder->getPayValidDt();
        $this->payValidTm = $builder->getPayValidTm();
    }

    public static function builder(): PayloanBuilder
    {
        return new PayloanBuilder;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }
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
    public function getBillingAddr()
    {
        return $this->billingAddr;
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
    public function getDeliveryNm()
    {
        return $this->deliveryNm;
    }
    public function getDeliveryPhone()
    {
        return $this->deliveryPhone;
    }
    public function getDeliveryAddr()
    {
        return $this->deliveryAddr;
    }
    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }
    public function getDeliveryState()
    {
        return $this->deliveryState;
    }
    public function getDeliveryPostCd()
    {
        return $this->deliveryPostCd;
    }
    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }
    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getMerchantToken()
    {
        return $this->merchantToken;
    }
    public function getReqDomain()
    {
        return $this->reqDomain;
    }
    public function getReqServerIP()
    {
        return $this->reqServerIP;
    }
    public function getReqClientVer()
    {
        return $this->reqClientVer;
    }
    public function getUserIP()
    {
        return $this->userIP;
    }
    public function getUserSessionID()
    {
        return $this->userSessionID;
    }
    public function getUserAgent()
    {
        return $this->userAgent;
    }
    public function getUserLanguage()
    {
        return $this->userLanguage;
    }
    public function getCartData()
    {
        return $this->cartData;
    }
    public function getSellers()
    {
        return $this->sellers;
    }
    public function getInstmntType()
    {
        return $this->instmntType;
    }
    public function getInstmntMon()
    {
        return $this->instmntMon;
    }
    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function setMerchantToken(string $merchantToken): void
    {
        $this->merchantToken = $merchantToken;
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
            'billingAddr' => $this->billingAddr,
            'billingCity' => $this->billingCity,
            'billingState' => $this->billingState,
            'billingPostCd' => $this->billingPostCd,
            'billingCountry' => $this->billingCountry,
            'deliveryNm' => $this->deliveryNm,
            'deliveryPhone' => $this->deliveryPhone,
            'deliveryAddr' => $this->deliveryAddr,
            'deliveryCity' => $this->deliveryCity,
            'deliveryState' => $this->deliveryState,
            'deliveryPostCd' => $this->deliveryPostCd,
            'deliveryCountry' => $this->deliveryCountry,
            'dbProcessUrl' => $this->dbProcessUrl,
            'description' => $this->description,
            'merchantToken' => $this->merchantToken,
            'reqDomain' => $this->reqDomain,
            'reqServerIP' => $this->reqServerIP,
            'reqClientVer' => $this->reqClientVer,
            'userIP' => $this->userIP,
            'userSessionID' => $this->userSessionID,
            'userAgent' => $this->userAgent,
            'userLanguage' => $this->userLanguage,
            'cartData' => $this->cartData,
            'sellers' => $this->sellers,
            'instmntType' => $this->instmntType,
            'instmntMon' => $this->instmntMon,
            'mitraCd' => $this->mitraCd,
            'payValidDt' => $this->payValidDt,
            'payValidTm' => $this->payValidTm,

        ];
    }
}

class PayloanBuilder
{
    private  $timeStamp;
    private  $iMid;
    private  $payMethod;
    private  $currency;
    private  $amt;
    private  $referenceNo;
    private  $goodsNm;
    private  $billingNm;
    private  $billingPhone;
    private  $billingEmail;
    private  $billingAddr;
    private  $billingCity;
    private  $billingState;
    private  $billingPostCd;
    private  $billingCountry;
    private  $deliveryNm;
    private  $deliveryPhone;
    private  $deliveryAddr;
    private  $deliveryCity;
    private  $deliveryState;
    private  $deliveryPostCd;
    private  $deliveryCountry;
    private  $dbProcessUrl;
    private  $description;
    private  $merchantToken;
    private  $reqDomain;
    private  $reqServerIP;
    private  $reqClientVer;
    private  $userIP;
    private  $userSessionID;
    private  $userAgent;
    private  $userLanguage;
    private  $cartData;
    private  $sellers;
    private  $instmntType;
    private  $instmntMon;
    private  $mitraCd;
    private  $payValidDt;
    private  $payValidTm;

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }

    public function setPayValidTm(string $payValidTm): PayloanBuilder
    {
        $this->payValidTm = $payValidTm;
        return $this;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function setPayValidDt(string $payValidDt): PayloanBuilder
    {
        $this->payValidDt = $payValidDt;
        return $this;
    }

    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function setTimeStamp(string $timeStamp): PayloanBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function setIMid(string $iMid): PayloanBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function setPayMethod(string $payMethod): PayloanBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): PayloanBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function setAmt(string $amt): PayloanBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function setReferenceNo(string $referenceNo): PayloanBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function setGoodsNm(string $goodsNm): PayloanBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function setBillingNm(string $billingNm): PayloanBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    public function setBillingPhone(string $billingPhone): PayloanBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    public function setBillingEmail(string $billingEmail): PayloanBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }

    public function getBillingAddr()
    {
        return $this->billingAddr;
    }

    public function setBillingAddr(string $billingAddr): PayloanBuilder
    {
        $this->billingAddr = $billingAddr;
        return $this;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function setBillingCity(string $billingCity): PayloanBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function setBillingState(string $billingState): PayloanBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }

    public function getBillingPostCd()
    {
        return $this->billingPostCd;
    }

    public function setBillingPostCd(string $billingPostCd): PayloanBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function setBillingCountry(string $billingCountry): PayloanBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }




    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function setDbProcessUrl(string $dbProcessUrl): PayloanBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }





    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function setMerchantToken($timeStamp, $iMid, $reffNo, $amount, $merchantKey): PayloanBuilder
    {

        $this->merchantToken = $timeStamp . $iMid . $reffNo . $amount . $merchantKey;
        return $this;
    }

    public function build(): Payloan
    {
        return new Payloan($this);
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function setCartData($cartData): PayloanBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }

    public function getDeliveryNm()
    {
        return $this->deliveryNm;
    }

    public function setDeliveryNm($deliveryNm): PayloanBuilder
    {
        $this->deliveryNm = $deliveryNm;
        return $this;
    }

    public function getDeliveryPhone()
    {
        return $this->deliveryPhone;
    }

    public function setDeliveryPhone($deliveryPhone): PayloanBuilder
    {
        $this->deliveryPhone = $deliveryPhone;
        return $this;
    }

    public function getDeliveryAddr()
    {
        return $this->deliveryAddr;
    }

    public function setDeliveryAddr($deliveryAddr): PayloanBuilder
    {
        $this->deliveryAddr = $deliveryAddr;
        return $this;
    }

    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity($deliveryCity): PayloanBuilder
    {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }

    public function getDeliveryState()
    {
        return $this->deliveryState;
    }

    public function setDeliveryState($deliveryState): PayloanBuilder
    {
        $this->deliveryState = $deliveryState;
        return $this;
    }

    public function getDeliveryPostCd()
    {
        return $this->deliveryPostCd;
    }

    public function setDeliveryPostCd($deliveryPostCd): PayloanBuilder
    {
        $this->deliveryPostCd = $deliveryPostCd;
        return $this;
    }

    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry($deliveryCountry): PayloanBuilder
    {
        $this->deliveryCountry = $deliveryCountry;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): PayloanBuilder
    {
        $this->description = $description;
        return $this;
    }

    public function getReqDomain()
    {
        return $this->reqDomain;
    }

    public function setReqDomain($reqDomain): PayloanBuilder
    {
        $this->reqDomain = $reqDomain;
        return $this;
    }

    public function getReqServerIP()
    {
        return $this->reqServerIP;
    }

    public function setReqServerIP($reqServerIP): PayloanBuilder
    {
        $this->reqServerIP = $reqServerIP;
        return $this;
    }

    public function getUserIP()
    {
        return $this->userIP;
    }

    public function setUserIP($userIP): PayloanBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function setUserSessionID($userSessionID): PayloanBuilder
    {
        $this->userSessionID = $userSessionID;
        return $this;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setUserAgent($userAgent): PayloanBuilder
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function setUserLanguage($userLanguage): PayloanBuilder
    {
        $this->userLanguage = $userLanguage;
        return $this;
    }

    public function getReqClientVer()
    {
        return $this->reqClientVer;
    }

    public function setReqClientVer($reqClientVer)
    {
        $this->reqClientVer = $reqClientVer;
        return $this;
    }

    public function getSellers()
    {
        return $this->sellers;
    }

    public function setSellers($sellers): PayloanBuilder
    {
        $this->sellers = $sellers;
        return $this;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function setMitraCd($mitraCd): PayloanBuilder
    {
        $this->mitraCd = $mitraCd;
        return $this;
    }

    public function getInstmntType()
    {
        return $this->instmntType;
    }

    public function setInstmntType($instmntType): PayloanBuilder
    {
        $this->instmntType = $instmntType;
        return $this;
    }

    public function getInstmntMon()
    {
        return $this->instmntMon;
    }

    public function setInstmntMon($instmntMon): PayloanBuilder
    {
        $this->instmntMon = $instmntMon;
        return $this;
    }
}
