<?php

namespace Nicepay\data\response;


class NicepayV2Response
{
    private $resultCd;
    private $resultMsg;
    private $tXid;
    private $referenceNo;
    private $payMethod;
    private $amt;
    private $transDt;
    private $transTm;
    private $currency;
    private $goodsNm;
    private $billingNm;
    private $bankCd;
    private $vacctNo;
    private $vacctValidDt;
    private $vacctValidTm;

    //inquiry
    private $reqDt;
    private $reqTm;

    // Constructor
    function __construct(NicepayV2ResponseBuilder $builder)
    {
        $this->resultCd = $builder->getResultCd();
        $this->resultMsg = $builder->getResultMsg();
        $this->tXid = $builder->getTXid();
        $this->referenceNo = $builder->getReferenceNo();
        $this->payMethod = $builder->getPayMethod();
        $this->amt = $builder->getAmt();
        $this->transDt = $builder->getTransDt();
        $this->transTm = $builder->getTransTm();
        $this->currency = $builder->getCurrency();
        $this->goodsNm = $builder->getGoodsNm();
        $this->billingNm = $builder->getBillingNm();
        $this->bankCd = $builder->getBankCd();
        $this->vacctNo = $builder->getVacctNo();
        $this->vacctValidDt = $builder->getVacctValidDt();
        $this->vacctValidTm = $builder->getVacctValidTm();
    }

    // Getter and Setter methods

    public function getResultCd()
    {
        return $this->resultCd;
    }

    public function setResultCd($resultCd): void
    {
        $this->resultCd = $resultCd;
    }

    public function getResultMsg()
    {
        return $this->resultMsg;
    }

    public function setResultMsg($resultMsg): void
    {
        $this->resultMsg = $resultMsg;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function setTXid($tXid): void
    {
        $this->tXid = $tXid;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function setReferenceNo($referenceNo): void
    {
        $this->referenceNo = $referenceNo;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function setPayMethod($payMethod): void
    {
        $this->payMethod = $payMethod;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function setAmt($amt): void
    {
        $this->amt = $amt;
    }

    public function getTransDt()
    {
        return $this->transDt;
    }

    public function setTransDt($transDt): void
    {
        $this->transDt = $transDt;
    }

    public function getTransTm()
    {
        return $this->transTm;
    }

    public function setTransTm($transTm): void
    {
        $this->transTm = $transTm;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function setGoodsNm($goodsNm): void
    {
        $this->goodsNm = $goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function setBillingNm($billingNm): void
    {
        $this->billingNm = $billingNm;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function setBankCd($bankCd): void
    {
        $this->bankCd = $bankCd;
    }

    public function getVacctNo()
    {
        return $this->vacctNo;
    }

    public function setVacctNo($vacctNo): void
    {
        $this->vacctNo = $vacctNo;
    }

    public function getVacctValidDt()
    {
        return $this->vacctValidDt;
    }

    public function setVacctValidDt($vacctValidDt): void
    {
        $this->vacctValidDt = $vacctValidDt;
    }

    public function getVacctValidTm()
    {
        return $this->vacctValidTm;
    }

    public function setVacctValidTm($vacctValidTm): void
    {
        $this->vacctValidTm = $vacctValidTm;
    }

    public static function fromArray(array $data): self
    {
        $builder = (new NicepayV2ResponseBuilder())
            ->setResultCd($data['resultCd'] ?? null)
            ->setResultMsg($data['resultMsg'] ?? null)
            ->setTXid($data['tXid'] ?? null)
            ->setReferenceNo($data['referenceNo'] ?? null)
            ->setPayMethod($data['payMethod'] ?? null)
            ->setAmt($data['amt'] ?? null)
            ->setTransDt($data['transDt'] ?? null)
            ->setTransTm($data['transTm'] ?? null)
            ->setCurrency($data['currency'] ?? null)
            ->setGoodsNm($data['goodsNm'] ?? null)
            ->setBillingNm($data['billingNm'] ?? null)
            ->setBankCd($data['bankCd'] ?? null)
            ->setVacctNo($data['vacctNo'] ?? null)
            ->setVacctValidDt($data['vacctValidDt'] ?? null)
            ->setVacctValidTm($data['vacctValidTm'] ?? null);

        // Return the constructed NicepayV2Response using the builder
        return new self($builder);
    }
}

// Builder class
class NicepayV2ResponseBuilder
{
    private $resultCd;
    private $resultMsg;
    private $tXid;
    private $referenceNo;
    private $payMethod;
    private $amt;
    private $transDt;
    private $transTm;
    private $currency;
    private $goodsNm;
    private $billingNm;
    private $bankCd;
    private $vacctNo;
    private $vacctValidDt;
    private $vacctValidTm;

    public function getResultCd()
    {
        return $this->resultCd;
    }

    public function setResultCd($resultCd): NicepayV2ResponseBuilder
    {
        $this->resultCd = $resultCd;
        return $this;
    }

    public function getResultMsg()
    {
        return $this->resultMsg;
    }

    public function setResultMsg($resultMsg): NicepayV2ResponseBuilder
    {
        $this->resultMsg = $resultMsg;
        return $this;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function setTXid($tXid): NicepayV2ResponseBuilder
    {
        $this->tXid = $tXid;
        return $this;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function setReferenceNo($referenceNo): NicepayV2ResponseBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function setPayMethod($payMethod): NicepayV2ResponseBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function setAmt($amt): NicepayV2ResponseBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function getTransDt()
    {
        return $this->transDt;
    }

    public function setTransDt($transDt): NicepayV2ResponseBuilder
    {
        $this->transDt = $transDt;
        return $this;
    }

    public function getTransTm()
    {
        return $this->transTm;
    }

    public function setTransTm($transTm): NicepayV2ResponseBuilder
    {
        $this->transTm = $transTm;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency): NicepayV2ResponseBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function setGoodsNm($goodsNm): NicepayV2ResponseBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function setBillingNm($billingNm): NicepayV2ResponseBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function setBankCd($bankCd): NicepayV2ResponseBuilder
    {
        $this->bankCd = $bankCd;
        return $this;
    }

    public function getVacctNo()
    {
        return $this->vacctNo;
    }

    public function setVacctNo($vacctNo): NicepayV2ResponseBuilder
    {
        $this->vacctNo = $vacctNo;
        return $this;
    }

    public function getVacctValidDt()
    {
        return $this->vacctValidDt;
    }

    public function setVacctValidDt($vacctValidDt): NicepayV2ResponseBuilder
    {
        $this->vacctValidDt = $vacctValidDt;
        return $this;
    }

    public function getVacctValidTm()
    {
        return $this->vacctValidTm;
    }

    public function setVacctValidTm($vacctValidTm): NicepayV2ResponseBuilder
    {
        $this->vacctValidTm = $vacctValidTm;
        return $this;
    }

    public function build(): NicepayV2Response
    {
        return new NicepayV2Response($this);
    }
}
