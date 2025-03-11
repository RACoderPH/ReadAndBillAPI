<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $billing_id
 * @property int $agent_id
 * @property string $date_issued
 * @property string|null $remarks
 * @property string|null $reference
 * @property string|null $payment_type
 * @property float|null $amount_paid
 *
 * @property Agent $agent
 * @property Billing $billing
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['billing_id', 'agent_id', 'date_issued'], 'required'],
            [['billing_id', 'agent_id'], 'integer'],
            [['date_issued'], 'date','format' => 'Y-m-d'],
            [['amount_paid'], 'number'],
            [['remarks'], 'string', 'max' => 250],
            [['reference', 'payment_type'], 'string', 'max' => 50],
            [['billing_id'], 'unique', 'message' => 'Payment for this billing has already been recorded'],
            
            [['agent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agent::class, 'targetAttribute' => ['agent_id' => 'id']],
            [['billing_id'], 'exist', 'skipOnError' => true, 'targetClass' => Billing::class, 'targetAttribute' => ['billing_id' => 'id']],
        ];
    }


    public function fields()
    {
        return [
            'date_issued',
            'remarks',
            'reference',
            'payment_type',
            'amount_paid',

            'lastname' => function($model){
                return $model->billing->account->lastname;
            },
            'firstname' => function($model){
                return $model->billing->account->firstname;
            },
            'address' => function($model){
                return $model->billing->account->address;
            },            
            'biller_name' => function($model){
                return $model->agent->company_name;
            }
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'billing_id' => 'Billing ID',
            'agent_id' => 'Agent ID',
            'date_issued' => 'Date Issued',
            'remarks' => 'Remarks',
            'reference' => 'Reference',
            'payment_type' => 'Payment Type',
            'amount_paid' => 'Amount Paid',
        ];
    }

    /**
     * Gets query for [[Agent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }

    /**
     * Gets query for [[Billing]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilling()
    {
        return $this->hasOne(Billing::class, ['id' => 'billing_id']);
    }
}
