<?php

namespace Nicepay\data\model;

class Ewallet
{

    private $partnerReferenceNo;
    private $merchantId;
    private $subMerchantId;
    private $externalStoreId;
    private $validUpTo;
    private $pointOfInitiation;
    private array $amount;
    private array $additionalInfo;
    private array $urlParam;

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
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingPostCd;
    private $billingCountry;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $dbProcessUrl;
    private $merchantToken;
    private $reqDomain;
    private $reqServerIP;
    private $reqClientVer;
    private $userIP;
    private $userAgent;
    private $userSessionID;
    private $userLanguage;
    private $cartData;
    private $mitraCd;


    // Constructor

    public function __construct(EwalletBuilder $builder)
    {

        $this->partnerReferenceNo = $builder->getPartnerReferenceNo();
        $this->merchantId = $builder->getMerchantId();
        $this->subMerchantId = $builder->getSubMerchantId();
        $this->externalStoreId = $builder->getExternalStoreId();
        $this->validUpTo = $builder->getValidUpTo();
        $this->pointOfInitiation = $builder->getPointOfInitiation();
        $this->amount = $builder->getAmount();
        $this->additionalInfo = $builder->getAdditionalInfo();
        $this->urlParam = $builder->getUrlParam();

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
        $this->deliveryNm = $builder->getDeliveryNm();
        $this->deliveryPhone = $builder->getDeliveryPhone();
        $this->deliveryAddr = $builder->getDeliveryAddr();
        $this->deliveryCity = $builder->getDeliveryCity();
        $this->deliveryState = $builder->getDeliveryState();
        $this->deliveryPostCd = $builder->getDeliveryPostCd();
        $this->deliveryCountry = $builder->getDeliveryCountry();
        $this->dbProcessUrl = $builder->getDbProcessUrl();
        $this->merchantToken = $builder->getMerchantToken();
        $this->reqDomain = $builder->getReqDomain();
        $this->reqServerIP = $builder->getReqServerIP();
        $this->reqClientVer = $builder->getReqClientVer();
        $this->userIP = $builder->getUserIP();
        $this->userAgent = $builder->getUserAgent();
        $this->userSessionID = $builder->getUserSessionID();
        $this->userLanguage = $builder->getUserLanguage();
        $this->cartData = $builder->getCartData();
        $this->mitraCd = $builder->getMitraCd();
    }

    // Builder
    public static function builder(): EwalletBuilder
    {
        return new EwalletBuilder();
    }

    public function toArray(): array
    {
        return [
            "partnerReferenceNo" => $this->partnerReferenceNo,
            "merchantId" => $this->merchantId,
            "subMerchantId" => $this->subMerchantId,
            "externalStoreId" => $this->externalStoreId,
            "validUpTo" => $this->validUpTo,
            "pointOfInitiation" => $this->pointOfInitiation,
            "amount" => $this->amount,
            "additionalInfo" => $this->additionalInfo,
            "urlParam" => $this->urlParam,
        ];
    }

    public function toArrayV2(): array
    {
        return [
            "timeStamp" => $this->timeStamp,
            "iMid" => $this->iMid,
            "payMethod" => $this->payMethod,
            "currency" => $this->currency,
            "amt" => $this->amt,
            "referenceNo" => $this->referenceNo,
            "goodsNm" => $this->goodsNm,
            "billingNm" => $this->billingNm,
            "billingPhone" => $this->billingPhone,
            "billingEmail" => $this->billingEmail,
            "billingAddr" => $this->billingAddr,
            "billingCity" => $this->billingCity,
            "billingState" => $this->billingState,
            "billingPostCd" => $this->billingPostCd,
            "billingCountry" => $this->billingCountry,
            "deliveryNm" => $this->deliveryNm,
            "deliveryPhone" => $this->deliveryPhone,
            "deliveryAddr" => $this->deliveryAddr,
            "deliveryCity" => $this->deliveryCity,
            "deliveryState" => $this->deliveryState,
            "deliveryPostCd" => $this->deliveryPostCd,
            "deliveryCountry" => $this->deliveryCountry,
            "dbProcessUrl" => $this->dbProcessUrl,
            "merchantToken" => $this->merchantToken,
            "reqDomain" => $this->reqDomain,
            "reqServerIP" => $this->reqServerIP,
            "reqClientVer" => $this->reqClientVer,
            "userIP" => $this->userIP,
            "userAgent" => $this->userAgent,
            "userSessionID" => $this->userSessionID,
            "userLanguage" => $this->userLanguage,
            "cartData" => $this->cartData,
            "mitraCd" => $this->mitraCd
        ];
    }

    // GETTER
    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    public function getExternalStoreId()
    {
        return $this->externalStoreId;
    }

    public function getValidUpTo()
    {
        return $this->validUpTo;
    }

    public function getPointOfInitiation()
    {
        return $this->pointOfInitiation;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    public function getUrlParam()
    {
        return $this->urlParam;
    }

    // GETTER v2
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

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class EwalletBuilder
{

    private $partnerReferenceNo;
    private $merchantId;
    private $subMerchantId;
    private $externalStoreId;
    private $validUpTo;
    private $pointOfInitiation;
    private array $amount = [];
    private array $additionalInfo = [];
    private array $urlParam = [];

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
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingPostCd;
    private $billingCountry;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $dbProcessUrl;
    private $merchantToken;
    private $reqDomain;
    private $reqServerIP;
    private $reqClientVer;
    private $userIP;
    private $userAgent;
    private $userSessionID;
    private $userLanguage;
    private $cartData;
    private $mitraCd;

    // GETTER

    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    public function getExternalStoreId()
    {
        return $this->externalStoreId;
    }

    public function getValidUpTo()
    {
        return $this->validUpTo;
    }

    public function getPointOfInitiation()
    {
        return $this->pointOfInitiation;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    public function getUrlParam()
    {
        return $this->urlParam;
    }

    //  getter v2

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

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    // BUILDER SETTER

    public function partnerReferenceNo($partnerReferenceNo): EwalletBuilder
    {
        $this->partnerReferenceNo = $partnerReferenceNo;
        return $this;
    }

    public function merchantId($merchantId): EwalletBuilder
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    public function subMerchantId($subMerchantId): EwalletBuilder
    {
        $this->subMerchantId = $subMerchantId;
        return $this;
    }

    public function externalStoreId($externalStoreId): EwalletBuilder
    {
        $this->externalStoreId = $externalStoreId;
        return $this;
    }

    public function validUpTo($validUpTo): EwalletBuilder
    {
        $this->validUpTo = $validUpTo;
        return $this;
    }

    public function pointOfInitiation($pointOfInitiation): EwalletBuilder
    {
        $this->pointOfInitiation = $pointOfInitiation;
        return $this;
    }

    public function urlParam(array $urlParams): self
    {
        $urlParamList = [];

        foreach ($urlParams as $params) {
            if (count($params) === 3) {
                $paramListMap = [
                    "url" => $params[0],
                    "type" => $params[1],
                    "isDeeplink" => $params[2]
                ];
                $urlParamList[] = $paramListMap;
            }
        }

        $this->urlParam = $urlParamList;
        return $this;
    }

    public function amount($value, $currency): EwalletBuilder
    {
        $amount = [
            "value" => $value,
            "currency" => $currency,
        ];
        $this->amount = $amount;
        return $this;
    }

    public function additionalInfo($additionalInfo): EwalletBuilder
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function addInfoMitraCd($mitraCd): EwalletBuilder
    {
        $this->additionalInfo["mitraCd"] = $mitraCd;
        return $this;
    }

    public function addInfoGoodsNm($goodsNm): EwalletBuilder
    {
        $this->additionalInfo["goodsNm"] = $goodsNm;
        return $this;
    }
    public function addInfoBillingNm($billingNm): EwalletBuilder
    {
        $this->additionalInfo["billingNm"] = $billingNm;
        return $this;
    }


    public function addInfoBillingPhone($billingPhone): EwalletBuilder
    {
        $this->additionalInfo["billingPhone"] = $billingPhone;
        return $this;
    }

    public function addInfoCallBackUrl($callBackUrl): EwalletBuilder
    {
        $this->additionalInfo["callBackUrl"] = $callBackUrl;
        return $this;
    }

    public function addInfoDbProcessUrl($dbProcessUrl): EwalletBuilder
    {
        $this->additionalInfo["dbProcessUrl"] = $dbProcessUrl;
        return $this;
    }

    public function addInfoCartData($cartData): EwalletBuilder
    {
        $this->additionalInfo["cartData"] = $cartData;
        return $this;
    }

    public function addInfoMsId($msId): EwalletBuilder
    {
        $this->additionalInfo["msId"] = $msId;
        return $this;
    }

    public function addInfoMsfee($msfee): EwalletBuilder
    {
        $this->additionalInfo["msfee"] = $msfee;
        return $this;
    }

    public function addInfoMsfeetype($msfeetype): EwalletBuilder
    {
        $this->additionalInfo["msfeetype"] = $msfeetype;
        return $this;
    }

    public function addInfoMbfee($mbfee): EwalletBuilder
    {
        $this->additionalInfo["mbfee"] = $mbfee;
        return $this;
    }

    public function addInfoMbfeetype($mbfeetype): EwalletBuilder
    {
        $this->additionalInfo["mbfeetype"] = $mbfeetype;
        return $this;
    }

    // setter v2

    public function timeStamp($timeStamp): EwalletBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function iMid($iMid): EwalletBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function referenceNo($referenceNo): EwalletBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function payMethod($payMethod): EwalletBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function currency($currency): EwalletBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    public function amt($amt): EwalletBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function goodsNm($goodsNm): EwalletBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function billingNm($billingNm): EwalletBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function billingPhone($billingPhone): EwalletBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    public function billingEmail($billingEmail): EwalletBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }

    public function billingAddr($billingAddr): EwalletBuilder
    {
        $this->billingAddr = $billingAddr;
        return $this;
    }

    public function billingCity($billingCity): EwalletBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }

    public function billingState($billingState): EwalletBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }

    public function billingPostCd($billingPostCd): EwalletBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }

    public function billingCountry($billingCountry): EwalletBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }

    public function deliveryNm($deliveryNm): EwalletBuilder
    {
        $this->deliveryNm = $deliveryNm;
        return $this;
    }

    public function deliveryPhone($deliveryPhone): EwalletBuilder
    {
        $this->deliveryPhone = $deliveryPhone;
        return $this;
    }

    public function deliveryAddr($deliveryAddr): EwalletBuilder
    {
        $this->deliveryAddr = $deliveryAddr;
        return $this;
    }

    public function deliveryCity($deliveryCity): EwalletBuilder
    {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }

    public function deliveryState($deliveryState): EwalletBuilder
    {
        $this->deliveryState = $deliveryState;
        return $this;
    }

    public function deliveryPostCd($deliveryPostCd): EwalletBuilder
    {
        $this->deliveryPostCd = $deliveryPostCd;
        return $this;
    }

    public function deliveryCountry($deliveryCountry): EwalletBuilder
    {
        $this->deliveryCountry = $deliveryCountry;
        return $this;
    }

    public function dbProcessUrl($dbProcessUrl): EwalletBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }

    public function merchantToken($timeStamp, $iMid, $referenceNo, $amt, $merchantKey): EwalletBuilder
    {
        $this->merchantToken = $timeStamp . $iMid . $referenceNo . $amt . $merchantKey;
        return $this;
    }

    public function reqDomain($reqDomain): EwalletBuilder
    {
        $this->reqDomain = $reqDomain;
        return $this;
    }

    public function reqServerIP($reqServerIP): EwalletBuilder
    {
        $this->reqServerIP = $reqServerIP;
        return $this;
    }

    public function reqClientVer($reqClientVer): EwalletBuilder
    {
        $this->reqClientVer = $reqClientVer;
        return $this;
    }

    public function userIP($userIP): EwalletBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }

    public function userSessionID($userSessionID): EwalletBuilder
    {
        $this->userSessionID = $userSessionID;
        return $this;
    }

    public function userAgent($userAgent): EwalletBuilder
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function userLanguage($userLanguage): EwalletBuilder
    {
        $this->userLanguage = $userLanguage;
        return $this;
    }

    public function cartData($cartData): EwalletBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }

    public function mitraCd($mitraCd): EwalletBuilder
    {
        $this->mitraCd = $mitraCd;
        return $this;
    }



    // BUILD ()

    public function build(): Ewallet
    {
        return new Ewallet($this);
    }
}
