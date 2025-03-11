<?php

namespace common\models;

use yii\base\Model;

class PaymentForm extends Model
{
    public $bill_id;
    public $amount_paid;
    public $date_issued;

    public function rules()
    {
        return [            
            [['bill_id', 'amount_paid', 'date_issued'], 'required'],
            [['amount_paid'], 'number'],
            //[['date_issued'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['date_issued'], 'date','format' => 'Y-m-d'],
            ['bill_id', 'validateBillingAmount'], // Custom validation rule
        ];
    }

    /**
     * Validates that the submitted amount matches the billing record's amount.
     */
    public function validateBillingAmount($attribute, $params)
    {
        $billingRecord = Billing::findOne(['bill_id' => $this->bill_id]);
        if (!$billingRecord) {
            $this->addError('bill_id', 'Billing record not found.');
            return;
        }

        if ($billingRecord->amount_billed != $this->amount_paid) {
            $this->addError('amount_paid', 'The submitted amount does not match the billing amount.');
        }
    }

    /**
     * Process and save the payment data
     */
    public function processPayment(Agent $agent)
    {
        if (!$this->validate()) {
            return null;
        }

        // Convert bill_id to billing_id
        $billingRecord = Billing::findOne(['bill_id' => $this->bill_id]);
        if (!$billingRecord) {
            $this->addError('bill_id', 'Billing record not found.');
            return null;
        }

        $payment = new Payment();
        $payment->billing_id = $billingRecord->id;
        $payment->amount_paid = $this->amount_paid;
        $payment->date_issued = $this->date_issued;        
        $payment->agent_id = $agent->id;          
        $payment->reference = $this->generateReference();

        if ($payment->save()) {
            return $payment;
        } else {
            $this->addErrors($payment->getErrors());
            return null;
        }
    }


    /**
     * Generate a reference number in the format "REF-{bill_id}-{random number}"     
     */
    public function generateReference() {
        
        $n = 5; // n-digit length of the bill_id part

        // Ensure bill_id is a string and pad it with leading zeros if shorter than N
        $formattedBillId = str_pad($this->bill_id, $n, '0', STR_PAD_LEFT);

        // Generate a simple random number for demonstration
        $randomPart = rand(100000, 999999);

        return sprintf("BWD-%s-%s", $formattedBillId, $randomPart);
    }

    
}
