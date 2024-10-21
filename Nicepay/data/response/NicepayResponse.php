<?php 

namespace Nicepay\data\response;

class NicepayResponse {

    // Base
    private  $responseCode;
    private  $responseMessage;
    private  $accessToken;
    private  $expiresIn;
    private  $tokenType;
    private array $virtualAccountData = [];  // array/map
    private array $additionalInfo = [];      // array/map
    private array $totalAmount = [];

    // Virtual Account
    private  $partnerServiceId;
    private  $customerNo;
    private  $inquiryRequestId;
    private  $virtualAccountNo;
    private  $virtualAccountName;
    private  $trxId;
    private  $transactionStatusDesc;
    private  $latestTransactionStatus;
    private  $bankCd;
    private  $tXidVA;
    private  $goodsNm;
    private  $vacctValidTm;
    private  $vacctValidDt;

    private function __construct(NicepayResponseBuilder $builder) {
        
        $this->responseCode = $builder->getResponseCode();
        $this->responseMessage = $builder->getResponseMessage();
        
        $this->accessToken = $builder->getAccessToken();
        $this->expiresIn = $builder->getExpiresIn();
        $this->tokenType = $builder->getTokenType();
        $this->virtualAccountData = $builder->getVirtualAccountData();
        $this->additionalInfo = $builder->getAdditionalInfo();
        $this->totalAmount = $builder->getTotalAmount();

        // Virtual Account
        $this->partnerServiceId = $builder->getPartnerServiceId();
        $this->customerNo = $builder->getCustomerNo();
        $this->inquiryRequestId = $builder->getInquiryRequestId();
        $this->virtualAccountNo = $builder->getVirtualAccountNo();
        $this->virtualAccountName = $builder->getVirtualAccountName();
        $this->trxId = $builder->getTrxId();
        $this->transactionStatusDesc = $builder->getTransactionStatusDesc();
        $this->latestTransactionStatus = $builder->getLatestTransactionStatus();
        $this->bankCd = $builder->getBankCd();
        $this->tXidVA = $builder->getTXidVA();
        $this->goodsNm = $builder->getGoodsNm();
        $this->vacctValidTm = $builder->getVacctValidTm();
        $this->vacctValidDt = $builder->getVacctValidDt();
    }

    public static function fromArray(array $data): self {
        $builder = (new NicepayResponseBuilder())
            ->setResponseCode($data['responseCode'] ?? null)
            ->setResponseMessage($data['responseMessage'] ?? null)
            ->setAccessToken($data['accessToken'] ?? null)
            ->setExpiresIn($data['expiresIn'] ?? null)
            ->setTokenType($data['tokenType'] ?? null)
            ->setVirtualAccountData($data['virtualAccountData'] ?? [])
            ->setAdditionalInfo($data['additionalInfo'] ?? [])
            ->setTotalAmount($data['totalAmount'] ?? [])
            ->setPartnerServiceId($data['partnerServiceId'] ?? null)
            ->setCustomerNo($data['customerNo'] ?? null)
            ->setInquiryRequestId($data['inquiryRequestId'] ?? null)
            ->setVirtualAccountNo($data['virtualAccountNo'] ?? null)
            ->setVirtualAccountName($data['virtualAccountName'] ?? null)
            ->setTrxId($data['trxId'] ?? null)
            ->setTransactionStatusDesc($data['transactionStatusDesc'] ?? null)
            ->setLatestTransactionStatus($data['latestTransactionStatus'] ?? null)
            ->setBankCd($data['bankCd'] ?? null)
            ->setTXidVA($data['tXidVA'] ?? null)
            ->setGoodsNm($data['goodsNm'] ?? null)
            ->setVacctValidTm($data['vacctValidTm'] ?? null)
            ->setVacctValidDt($data['vacctValidDt'] ?? null);

        // Return the constructed NicepayResponse using the builder
        return new self($builder);
    }

    // Getters

    public function getResponseCode()  {
        return $this->responseCode;
    }

    public function getResponseMessage()  {
        return $this->responseMessage;
    }
    
    public function getAccessToken()  {
        return $this->accessToken;
    }

    public function getExpiresIn() {
        return $this->expiresIn;
    }

    public function getTokenType() {
        return $this->tokenType;
    }

    public function getVirtualAccountData(): array {
        return $this->virtualAccountData;
    }

    public function getAdditionalInfo(): array {
        return $this->additionalInfo;
    }

    public function getTotalAmount(): array {
        return $this->totalAmount;
    }

    // Virtual Account Getters
    public function getPartnerServiceId()  {
        return $this->partnerServiceId;
    }

    public function getCustomerNo() {
        return $this->customerNo;
    }

    public function getInquiryRequestId() {
        return $this->inquiryRequestId;
    }

    public function getVirtualAccountNo() {
        return $this->virtualAccountNo;
    }

    public function getVirtualAccountName()  {
        return $this->virtualAccountName;
    }

    public function getTrxId()  {
        return $this->trxId;
    }

    public function getTransactionStatusDesc()  {
        return $this->transactionStatusDesc;
    }

    public function getLatestTransactionStatus()  {
        return $this->latestTransactionStatus;
    }

    public function getBankCd()  {
        return $this->bankCd;
    }

    public function getTXidVA()  {
        return $this->tXidVA;
    }

    public function getGoodsNm()  {
        return $this->goodsNm;
    }

    public function getVacctValidTm()  {
        return $this->vacctValidTm;
    }

    public function getVacctValidDt()  {
        return $this->vacctValidDt;
    }

    // Builder Class
    public static function builder(): NicepayResponseBuilder {
        return new NicepayResponseBuilder();
    }
}

class NicepayResponseBuilder {
    private  $responseCode;
    private  $responseMessage;
    private  $accessToken;
    private  $expiresIn;
    private  $tokenType;
    private array $virtualAccountData = [];  // array/map
    private array $additionalInfo = [];      // array/map
    private array $totalAmount = [];

    // Virtual Account
    private  $partnerServiceId;
    private  $customerNo;
    private  $inquiryRequestId;
    private  $virtualAccountNo;
    private  $virtualAccountName;
    private  $trxId;
    private  $transactionStatusDesc;
    private  $latestTransactionStatus;
    private  $bankCd;
    private  $tXidVA;
    private  $goodsNm;
    private  $vacctValidTm;
    private  $vacctValidDt;

    // Setters

    public function setResponseCode( $responseCode): NicepayResponseBuilder {
        $this->responseCode = $responseCode;
        return $this;
    }


    public function setresponseMessage( $responseMessage): NicepayResponseBuilder {
        $this->responseMessage = $responseMessage;
        return $this;
    }

    public function setAccessToken( $accessToken): NicepayResponseBuilder {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function setExpiresIn( $expiresIn): NicepayResponseBuilder {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    public function setTokenType( $tokenType): NicepayResponseBuilder {
        $this->tokenType = $tokenType;
        return $this;
    }

    public function setVirtualAccountData(array $virtualAccountData): NicepayResponseBuilder {
        $this->virtualAccountData = $virtualAccountData;
        return $this;
    }

    public function setAdditionalInfo(array $additionalInfo): NicepayResponseBuilder {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function setTotalAmount(array $totalAmount): NicepayResponseBuilder {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    // Virtual Account Setters
    public function setPartnerServiceId( $partnerServiceId): NicepayResponseBuilder {
        $this->partnerServiceId = $partnerServiceId;
        return $this;
    }

    public function setCustomerNo( $customerNo): NicepayResponseBuilder {
        $this->customerNo = $customerNo;
        return $this;
    }

    public function setInquiryRequestId( $inquiryRequestId): NicepayResponseBuilder {
        $this->inquiryRequestId = $inquiryRequestId;
        return $this;
    }

    public function setVirtualAccountNo( $virtualAccountNo): NicepayResponseBuilder {
        $this->virtualAccountNo = $virtualAccountNo;
        return $this;
    }

    public function setVirtualAccountName( $virtualAccountName): NicepayResponseBuilder {
        $this->virtualAccountName = $virtualAccountName;
        return $this;
    }

    public function setTrxId( $trxId): NicepayResponseBuilder {
        $this->trxId = $trxId;
        return $this;
    }

    public function setTransactionStatusDesc( $transactionStatusDesc): NicepayResponseBuilder {
        $this->transactionStatusDesc = $transactionStatusDesc;
        return $this;
    }

    public function setLatestTransactionStatus( $latestTransactionStatus): NicepayResponseBuilder {
        $this->latestTransactionStatus = $latestTransactionStatus;
        return $this;
    }

    public function setBankCd( $bankCd): NicepayResponseBuilder {
        $this->bankCd = $bankCd;
        return $this;
    }

    public function setTXidVA( $tXidVA): NicepayResponseBuilder {
        $this->tXidVA = $tXidVA;
        return $this;
    }

    public function setGoodsNm( $goodsNm): NicepayResponseBuilder {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function setVacctValidTm( $vacctValidTm): NicepayResponseBuilder {
        $this->vacctValidTm = $vacctValidTm;
        return $this;
    }

    public function setVacctValidDt( $vacctValidDt): NicepayResponseBuilder {
        $this->vacctValidDt = $vacctValidDt;
        return $this;
    }

    // Getters 

    public function getResponseCode()  {
        return $this->responseCode;
    }

    public function getResponseMessage()  {
        return $this->responseMessage;
    }

    public function getAccessToken()  {
        return $this->accessToken;
    }

    public function getExpiresIn()  {
        return $this->expiresIn;
    }

    public function getTokenType()  {
        return $this->tokenType;
    }

    public function getVirtualAccountData(): array {
        return $this->virtualAccountData;
    }

    public function getAdditionalInfo(): array {
        return $this->additionalInfo;
    }

    public function getTotalAmount(): array {
        return $this->totalAmount;
    }

    // Virtual Account Getters
    public function getPartnerServiceId()  {
        return $this->partnerServiceId;
    }

    public function getCustomerNo()  {
        return $this->customerNo;
    }

    public function getInquiryRequestId()  {
        return $this->inquiryRequestId;
    }

    public function getVirtualAccountNo()  {
        return $this->virtualAccountNo;
    }

    public function getVirtualAccountName()  {
        return $this->virtualAccountName;
    }

    public function getTrxId()  {
        return $this->trxId;
    }

    public function getTransactionStatusDesc()  {
        return $this->transactionStatusDesc;
    }

    public function getLatestTransactionStatus()  {
        return $this->latestTransactionStatus;
    }

    public function getBankCd()  {
        return $this->bankCd;
    }

    public function getTXidVA()  {
        return $this->tXidVA;
    }

    public function getGoodsNm()  {
        return $this->goodsNm;
    }

    public function getVacctValidTm()  {
        return $this->vacctValidTm;
    }

    public function getVacctValidDt()  {
        return $this->vacctValidDt;
    }

    // Build method
    public function build(): NicepayResponse {
        return new NicepayResponse($this);
    }
}
   

