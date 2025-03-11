<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property int $id
 * @property int $account_id
 * @property string $bill_id
 * @property string $bill_status_code
 * @property string $bill_period_code
 * @property string $date_period_from
 * @property string $date_period_to
 * @property string $date_payment_due
 * @property string $date_discon
 * @property int $last_reading
 * @property int $previous_reading
 * @property int $water_consumption
 * @property float $amount_billed
 * @property float $amount_penalty
 * @property float $sr_citizen_disc
 * @property float|null $franchise_tax
 * @property float|null $adjustments
 * @property string $billed_by
 * @property string $billed_On
 * @property float|null $water_maintenance_fee
 * @property float|null $advance_payment
 * @property string|null $billing_type
 * @property string $penalty_date
 *
 * @property Account $account
 * @property Payment $payment
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'bill_id', 'bill_status_code', 'bill_period_code', 'date_period_from', 'date_period_to', 'date_payment_due', 'date_discon', 'last_reading', 'previous_reading', 'water_consumption', 'amount_billed', 'amount_penalty', 'sr_citizen_disc', 'billed_by', 'billed_On', 'penalty_date'], 'required'],
            [['account_id', 'last_reading', 'previous_reading', 'water_consumption'], 'integer'],
            
            [['amount_billed', 'amount_penalty', 'sr_citizen_disc', 'franchise_tax', 'adjustments', 'water_maintenance_fee', 'advance_payment'], 'number'],
            [['bill_id', 'bill_status_code'], 'string', 'max' => 20],
            [['bill_period_code', 'billed_by', 'billing_type'], 'string', 'max' => 100],

            [['date_period_from','date_period_to','date_payment_due','date_discon','billed_on','penalty_date'], 'date', 'format' => 'php:Y-m-d'],  

            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::class, 'targetAttribute' => ['account_id' => 'id']],
        ];
    }

    public function fields()
    {
        return [
            'bill_id',
            'date_period_from',
            'date_period_to',
            'date_payment_due',
            'amount_billed',

            'lastname' => function($model){
                return $model->account->lastname;
            },
            'firstname' => function($model){
                return $model->account->firstname;
            },
            'address' => function($model){
                return $model->account->address;
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
            'account_id' => 'Account ID',
            'bill_id' => 'Bill ID',
            'bill_status_code' => 'Bill Status Code',
            'bill_period_code' => 'Bill Period Code',
            'date_period_from' => 'Date Period From',
            'date_period_to' => 'Date Period To',
            'date_payment_due' => 'Date Payment Due',
            'date_discon' => 'Date Discon',
            'last_reading' => 'Last Reading',
            'previous_reading' => 'Previous Reading',
            'water_consumption' => 'Water Consumption',
            'amount_billed' => 'Amount Billed',
            'amount_penalty' => 'Amount Penalty',
            'sr_citizen_disc' => 'Sr Citizen Disc',
            'franchise_tax' => 'Franchise Tax',
            'adjustments' => 'Adjustments',
            'billed_by' => 'Billed By',
            'billed_on' => 'Billed On',
            'water_maintenance_fee' => 'Water Maintenance Fee',
            'advance_payment' => 'Advance Payment',
            'billing_type' => 'Billing Type',
            'penalty_date' => 'Penalty Date',
        ];
    }

    /**
     * Gets query for [[Account]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id']);
    }

    /**
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::class, ['billing_id' => 'id']);
    }
}
