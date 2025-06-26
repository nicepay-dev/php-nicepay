<?php

namespace Nicepay\Data\Model;

class Payout
{

    private $merchantId;
    private $beneficiaryAccountNo;
    private $beneficiaryName;
    private $beneficiaryPhone;
    private $beneficiaryCustomerResidence;
    private $beneficiaryCustomerType;
    private $beneficiaryPostalCode;
    private $payoutMethod;
    private $beneficiaryBankCode;
    private array $amount;
    private $partnerReferenceNo;
    private $description;
    private $deliveryName;
    private $deliveryId;
    private $reservedDt;
    private $reservedTm;

    private $originalReferenceNo;

    private $originalPartnerReferenceNo;

    private $accountNo;
    private $additionalInfo;
    private $msId;

    //    V2
    private $timeStamp;
    private $iMid;
    private $merchantToken;
    private $benefNm;
    private $benefStatus;
    private $benefType;
    private $bankCd;
    private $amt;
    private $referenceNo;
    private $benefPhone;
    private $tXid;




    // CONSTRUCT 

    public function __construct(PayoutBuilder $builder)
    {

        $this->merchantId = $builder->getMerchantId();
        $this->beneficiaryAccountNo = $builder->getBeneficiaryAccountNo();
        $this->beneficiaryName = $builder->getBeneficiaryName();
        $this->beneficiaryPhone = $builder->getBeneficiaryPhone();
        $this->beneficiaryCustomerResidence = $builder->getBeneficiaryCustomerResidence();
        $this->beneficiaryCustomerType = $builder->getBeneficiaryCustomerType();
        $this->beneficiaryPostalCode = $builder->getBeneficiaryPostalCode();
        $this->payoutMethod = $builder->getPayoutMethod();
        $this->beneficiaryBankCode = $builder->getBeneficiaryBankCode();
        $this->amount = $builder->getAmount();
        $this->partnerReferenceNo = $builder->getPartnerReferenceNo();
        $this->description = $builder->getDescription();
        $this->deliveryName = $builder->getDeliveryName();
        $this->deliveryId = $builder->getDeliveryId();
        $this->reservedDt = $builder->getReservedDt();
        $this->reservedTm = $builder->getReservedTm();

        $this->originalReferenceNo = $builder->getOriginalReferenceNo();
        $this->originalPartnerReferenceNo = $builder->getOriginalPartnerReferenceNo();
        $this->accountNo = $builder->getAccountNo();
        $this->additionalInfo = $builder->getAdditionalInfo();
        $this->msId = $builder->getMsId();

        // V2 

        $this->timeStamp = $builder->getTimeStamp();
        $this->iMid = $builder->getIMid();
        $this->merchantToken = $builder->getMerchantToken();
        $this->benefNm = $builder->getBenefNm();
        $this->benefStatus = $builder->getBenefStatus();
        $this->benefType = $builder->getBenefType();
        $this->bankCd = $builder->getBankCd();
        $this->amt = $builder->getAmt();
        $this->referenceNo = $builder->getReferenceNo();
        $this->benefPhone = $builder->getBenefPhone();

        $this->tXid = $builder->getTXid();
    }

    //  builder 

    public static function builder(): PayoutBuilder
    {
        return new PayoutBuilder();
    }

    // TO ARRAY

    public function toArray()
    {
        $data = [
            "merchantId" => $this->merchantId ?? null,
            "beneficiaryAccountNo" => $this->beneficiaryAccountNo ?? null,
            "beneficiaryName" => $this->beneficiaryName ?? null,
            "beneficiaryPhone" => $this->beneficiaryPhone ?? null,
            "beneficiaryCustomerResidence" => $this->beneficiaryCustomerResidence ?? null,
            "beneficiaryCustomerType" => $this->beneficiaryCustomerType ?? null,
            "beneficiaryPostalCode" => $this->beneficiaryPostalCode ?? null,
            "payoutMethod" => $this->payoutMethod ?? null,
            "beneficiaryBankCode" => $this->beneficiaryBankCode ?? null,
            "amount" => $this->amount ?? [],
            "partnerReferenceNo" => $this->partnerReferenceNo ?? null,
            "description" => $this->description ?? null,
            "reservedDt" => $this->reservedDt ?? null,
            "reservedTm" => $this->reservedTm ?? null,
        ];
        if (isset($this->additionalInfo)) {
            $data['additionalInfo'] = $this->additionalInfo;
        };

        if (isset($this->accountNo)) {
            $data['accountNo'] = $this->accountNo;
        };

        if (isset($this->msId)) {
            $data['msId'] = $this->msId;
        }

        if (isset($this->originalReferenceNo)) {
            $data['originalReferenceNo'] = $this->originalReferenceNo;
        }

        if (isset($this->originalPartnerReferenceNo)) {
            $data['originalPartnerReferenceNo'] = $this->originalPartnerReferenceNo;
        }

        if (isset($this->deliveryId)) {
            $data['deliveryId'] = $this->deliveryId;
        }

        if (isset($this->deliveryName)) {
            $data['deliveryName'] = $this->deliveryName;
        }


        return $data;
    }

    public function toArrayV2()
    {
        $arrV2 = [];

        $fields = [
            'timeStamp',
            'merchantToken',
            'referenceNo',
            'amt',
            'iMid',
            'benefNm',
            'benefStatus',
            'benefType',
            'bankCd',
            'benefPhone',
            'msId',
            'accountNo',
            'reservedDt',
            'reservedTm',
            'description',
            'payoutMethod',
            'tXid'
        ];

        foreach ($fields as $field) {
            if (property_exists($this, $field) && $this->{$field} !== null) {
                $arrV2[$field] = $this->{$field};
            }
        }

        return $arrV2;
    }


    // GETTER

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function getBeneficiaryAccountNo()
    {
        return $this->beneficiaryAccountNo;
    }

    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }

    public function getBeneficiaryPhone()
    {
        return $this->beneficiaryPhone;
    }

    public function getBeneficiaryCustomerResidence()
    {
        return $this->beneficiaryCustomerResidence;
    }

    public function getBeneficiaryCustomerType()
    {
        return $this->beneficiaryCustomerType;
    }

    public function getBeneficiaryPostalCode()
    {
        return $this->beneficiaryPostalCode;
    }

    public function getPayoutMethod()
    {
        return $this->payoutMethod;
    }

    public function getBeneficiaryBankCode()
    {
        return $this->beneficiaryBankCode;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    public function getDeliveryId()
    {
        return $this->deliveryId;
    }

    public function getReservedDt()
    {
        return $this->reservedDt;
    }

    public function getReservedTm()
    {
        return $this->reservedTm;
    }

    public function getOriginalReferenceNo()
    {
        return $this->originalReferenceNo;
    }

    public function getOriginalPartnerReferenceNo()
    {
        return $this->originalPartnerReferenceNo;
    }

    public function getAccountNo()
    {
        return $this->accountNo;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    // GETTER V2
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getBenefNm()
    {
        return $this->benefNm;
    }

    public function getBenefStatus()
    {
        return $this->benefStatus;
    }

    public function getBenefType()
    {
        return $this->benefType;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getBenefPhone()
    {
        return $this->benefPhone;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getMsId()
    {
        return $this->msId;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class PayoutBuilder
{

    private $merchantId;
    private $beneficiaryAccountNo;
    private $beneficiaryName;
    private $beneficiaryPhone;
    private $beneficiaryCustomerResidence;
    private $beneficiaryCustomerType;
    private $beneficiaryPostalCode;
    private $payoutMethod;
    private $beneficiaryBankCode;
    private array $amount = [];
    private $partnerReferenceNo;
    private $description;
    private $deliveryName;
    private $deliveryId;
    private $reservedDt;
    private $reservedTm;

    private $originalReferenceNo;

    private $originalPartnerReferenceNo;

    private $accountNo;

    private $additionalInfo;
    private $msId;



    // V2 

    private $timeStamp;
    private $iMid;
    private $merchantToken;
    private $benefNm;
    private $benefStatus;
    private $benefType;
    private $bankCd;
    private $amt;
    private $referenceNo;
    private $benefPhone;

    private $tXid;


    // BUILD 


    public function build(): Payout
    {
        return new Payout($this);
    }

    // GETTER

    public function getMsId()
    {
        return $this->msId;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function getBeneficiaryAccountNo()
    {
        return $this->beneficiaryAccountNo;
    }

    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }

    public function getBeneficiaryPhone()
    {
        return $this->beneficiaryPhone;
    }

    public function getBeneficiaryCustomerResidence()
    {
        return $this->beneficiaryCustomerResidence;
    }

    public function getBeneficiaryCustomerType()
    {
        return $this->beneficiaryCustomerType;
    }

    public function getBeneficiaryPostalCode()
    {
        return $this->beneficiaryPostalCode;
    }

    public function getPayoutMethod()
    {
        return $this->payoutMethod;
    }

    public function getBeneficiaryBankCode()
    {
        return $this->beneficiaryBankCode;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPartnerReferenceNo()
    {
        return $this->partnerReferenceNo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    public function getDeliveryId()
    {
        return $this->deliveryId;
    }

    public function getReservedDt()
    {
        return $this->reservedDt;
    }

    public function getReservedTm()
    {
        return $this->reservedTm;
    }

    public function getOriginalReferenceNo()
    {
        return $this->originalReferenceNo;
    }

    public function getOriginalPartnerReferenceNo()
    {
        return $this->originalPartnerReferenceNo;
    }

    public function getAccountNo()
    {
        return $this->accountNo;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    // GETTER V2    
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getBenefNm()
    {
        return $this->benefNm;
    }

    public function getBenefStatus()
    {
        return $this->benefStatus;
    }

    public function getBenefType()
    {
        return $this->benefType;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getBenefPhone()
    {
        return $this->benefPhone;
    }

    public function getTXid()
    {
        return $this->tXid;
    }


    //  SETTER
    public function msId($msId): PayoutBuilder
    {
        $this->msId = $msId;
        return $this;
    }

    public function merchantId($merchantId): PayoutBuilder
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    public function beneficiaryAccountNo($beneficiaryAccountNo): PayoutBuilder
    {
        $this->beneficiaryAccountNo = $beneficiaryAccountNo;
        return $this;
    }

    public function beneficiaryName($beneficiaryName): PayoutBuilder
    {
        $this->beneficiaryName = $beneficiaryName;
        return $this;
    }

    public function beneficiaryPhone($beneficiaryPhone): PayoutBuilder
    {
        $this->beneficiaryPhone = $beneficiaryPhone;
        return $this;
    }

    public function beneficiaryCustomerResidence($beneficiaryCustomerResidence): PayoutBuilder
    {
        $this->beneficiaryCustomerResidence = $beneficiaryCustomerResidence;
        return $this;
    }

    public function beneficiaryCustomerType($beneficiaryCustomerType): PayoutBuilder
    {
        $this->beneficiaryCustomerType = $beneficiaryCustomerType;
        return $this;
    }

    public function beneficiaryPostalCode($beneficiaryPostalCode): PayoutBuilder
    {
        $this->beneficiaryPostalCode = $beneficiaryPostalCode;
        return $this;
    }

    public function payoutMethod($payoutMethod): PayoutBuilder
    {
        $this->payoutMethod = $payoutMethod;
        return $this;
    }

    public function beneficiaryBankCode($beneficiaryBankCode): PayoutBuilder
    {
        $this->beneficiaryBankCode = $beneficiaryBankCode;
        return $this;
    }

    public function amount($value, $currency): PayoutBuilder
    {
        $this->amount = [
            "value" => $value,
            "currency" => $currency,
        ];
        return $this;
    }

    public function partnerReferenceNo($partnerReferenceNo)
    {
        $this->partnerReferenceNo = $partnerReferenceNo;
        return $this;
    }

    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    public function deliveryName($deliveryName): self
    {
        $this->deliveryName = $deliveryName;
        return $this;
    }

    public function deliveryId($deliveryId): self
    {
        $this->deliveryId = $deliveryId;
        return $this;
    }

    public function reservedDt($reservedDt): self
    {
        $this->reservedDt = $reservedDt;
        return $this;
    }

    public function reservedTm($reservedTm): self
    {
        $this->reservedTm = $reservedTm;
        return $this;
    }

    public function originalReferenceNo($originalReferenceNo): self
    {

        $this->originalReferenceNo = $originalReferenceNo;
        return $this;
    }

    public function originalPartnerReferenceNo($originalPartnerReferenceNo): self
    {
        $this->originalPartnerReferenceNo = $originalPartnerReferenceNo;
        return $this;
    }

    public function accountNo($accountNo)
    {
        $this->accountNo = $accountNo;
        return $this;
    }

    public function additionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    // SETTER V2 

    public function timeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function iMid($iMid)
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function merchantToken($timeStamp, $imid, $amount, $accountNo, $merchantKey)
    {
        $this->merchantToken = $timeStamp . $imid . $amount . $accountNo . $merchantKey;
        return $this;
    }

    public function merchantTokenPayoutAction($timeStamp, $imid, $tXid, $merchantKey)
    {
        $this->merchantToken = $timeStamp . $imid . $tXid  . $merchantKey;
        return $this;
    }

    public function merchantTokenPayoutInquiry($timeStamp, $imid, $tXid, $accountNo, $merchantKey)
    {
        $this->merchantToken = $timeStamp . $imid . $tXid  . $accountNo . $merchantKey;
        return $this;
    }

    public function merchantTokenBalancePayout($timeStamp, $imid, $merchantKey)
    {
        $this->merchantToken = $timeStamp . $imid  . $merchantKey;
        return $this;
    }

    public function benefNm($benefNm)
    {
        $this->benefNm = $benefNm;
        return $this;
    }

    public function benefStatus($benefStatus)
    {
        $this->benefStatus = $benefStatus;
        return $this;
    }

    public function benefType($benefType)
    {
        $this->benefType = $benefType;
        return $this;
    }

    public function bankCd($bankCd)
    {
        $this->bankCd = $bankCd;
        return $this;
    }

    public function amt($amt)
    {
        $this->amt = $amt;
        return $this;
    }

    public function referenceNo($referenceNo)
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function benefPhone($benefPhone)
    {
        $this->benefPhone = $benefPhone;
        return $this;
    }

    public function tXid($tXid)
    {
        $this->tXid = $tXid;
        return $this;
    }
}
