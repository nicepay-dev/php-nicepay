<?php

namespace Nicepay\Data\Model;

class InquiryStatus
{
    // SNAP 
    private $partnerServiceId;
    private $customerNo;
    private $virtualAccountNo;
    private $inquiryRequestId;
    private array $additionalInfo; // totalAmount, tXidVA, trxId

    // V2
    private $iMid;
    private $timeStamp ;
    private $tXid;
    private $merchantToken;
    private $referenceNo;
    private $amt;

    public function getMerchantToken (){
        return $this->merchantToken;
    }
    public function setMerchantToken($merchantToken){
        $this->merchantToken = $merchantToken;
    }


    public function __construct(InquiryStatusBuilder $builder)
    {
        $this->partnerServiceId = $builder->getPartnerServiceId();
        $this->customerNo = $builder->getCustomerNo();
        $this->virtualAccountNo = $builder->getVirtualAccountNo();
        $this->additionalInfo = $builder->getAdditionalInfo();
        $this->inquiryRequestId = $builder->getInquiryRequestId();

        $this->timeStamp = $builder->getTimeStamp();
        $this->tXid = $builder->getTxId();
        $this->merchantToken = $builder->getMerchantToken();
        $this->referenceNo = $builder->getReferenceNo();
        $this->amt = $builder->getAmt();
        $this->iMid = $builder->getImid();

    }

    public static function builder(): InquiryStatusBuilder
    {
        return new InquiryStatusBuilder();
    }

    public function toArray(): array
    {
        return [
            'partnerServiceId' => $this->partnerServiceId,
            'customerNo' => $this->customerNo,
            'virtualAccountNo' => $this->virtualAccountNo,
            'inquiryRequestId' => $this->inquiryRequestId,
            'additionalInfo' => $this->additionalInfo,
        ];
    }

    public function toArrayV2(): array {
        return [
            'timeStamp' => $this->timeStamp,
            'tXid' => $this->tXid,
            'merchantToken' => $this->merchantToken,
            'referenceNo' => $this->referenceNo,
            'amt' => $this->amt,
            'iMid' => $this->iMid

        ];
    }
}

class InquiryStatusBuilder
{

    private $partnerServiceId;
    private $customerNo;
    private $virtualAccountNo;
    private $inquiryRequestId;
    private array $additionalInfo = [];


    private $timeStamp ;
    private $txId;
    private $merchantToken;
    private $referenceNo;
    private $amt;

    private $iMid;


    // getter 

    public function getPartnerServiceId()
    {
        return $this->partnerServiceId;
    }

    public function getCustomerNo()
    {
        return $this->customerNo;
    }

    public function getVirtualAccountNo()
    {
        return $this->virtualAccountNo;
    }

    public function getInquiryRequestId()
    {
        return $this->inquiryRequestId;
    }
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }


    public function getTimeStamp(){
        return $this->timeStamp;
    }

    public function getTxId(){
        return $this->txId;
    }
    public function getMerchantToken(){
        return $this->merchantToken;
    }

    public function getReferenceNo(){
        return $this->referenceNo;
    }

    public function getAmt(){
        return $this->amt;
    }

    public function getIMid(){
        return $this->iMid;
    }


    // Setter
    public function setPartnerServiceId($partnerServiceId): InquiryStatusBuilder
    {
        $this->partnerServiceId = $partnerServiceId;
        return $this;
    }

    public function setCustomerNo($customerNo): InquiryStatusBuilder
    {
        $this->customerNo = $customerNo;
        return $this;
    }

    public function setVirtualAccountNo($virtualAccountNo): InquiryStatusBuilder
    {
        $this->virtualAccountNo = $virtualAccountNo;
        return $this;
    }

    public function setInquiryRequestId($inquiryRequestId): InquiryStatusBuilder
    {
        $this->inquiryRequestId = $inquiryRequestId;
        return $this;
    }


    public function setTotalAmount($value, $currency): InquiryStatusBuilder
    {
        $this->additionalInfo["totalAmount"] = [
            "value"=> $value,
            "currency" => $currency,
        ];
        return $this;
    }

    public function setTrxId($trxId): InquiryStatusBuilder
    {
        $this->additionalInfo["trxId"] = $trxId;
        return $this;
    }

    public function setTxIdVA($txIdVA): InquiryStatusBuilder
    {
        $this->additionalInfo["tXidVA"] = $txIdVA;
        return $this;
    }


    public function setTimeStamp($timeStamp): InquiryStatusBuilder{
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setTxId($txId) : InquiryStatusBuilder {
        $this->txId = $txId;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $reffNo, $amount, $merchantKey): InquiryStatusBuilder{

        $this->merchantToken = $timeStamp. $iMid. $reffNo. $amount. $merchantKey;
        return $this;
    }

    public function setReferenceNo($reffNo) : InquiryStatusBuilder {
        $this->referenceNo = $reffNo;
        return $this;
    }

    public function setAmt($amt) : InquiryStatusBuilder {
        $this->amt = $amt;
        return $this;
    }

    public function setIMid($iMid) : InquiryStatusBuilder {
        $this->iMid = $iMid;
        return $this;
    }


    // build
    public function build(): InquiryStatus
    {
        return new InquiryStatus($this);
    }
}
