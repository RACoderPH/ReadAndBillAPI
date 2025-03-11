<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property int $id
 * @property string $sin
 * @property string $service_status_code
 * @property string $address
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 * @property string|null $birthday
 * @property string $phone
 * @property string $email
 * @property string $zone_no
 * @property string $seq_no
 * @property string $connection_category_code
 * @property int $senior_citizen
 * @property string $meter_size
 * @property string $account_name
 * @property string|null $date_last_discon
 * @property string|null $date_last_recon
 * @property string|null $date_connected
 * @property string $meter_no
 *
 * @property Billing[] $billings
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sin', 'service_status_code', 'address', 'lastname', 'firstname', 'middlename', 'phone', 'zone_no', 'seq_no', 'connection_category_code', 'senior_citizen', 'meter_size', 'account_name', 'meter_no'], 'required'],            
            [['sin', 'address', 'lastname', 'firstname', 'middlename', 'phone', 'email', 'zone_no', 'seq_no', 'connection_category_code', 'account_name', 'meter_no'], 'string', 'max' => 250],
            [['service_status_code'], 'string', 'max' => 10],
            [['meter_size'], 'string', 'max' => 4],
            [['senior_citizen'], 'boolean'],
            [['email'], 'email'], 
            [['birthday','date_last_discon','date_last_recon','date_connected'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sin' => 'Sin',
            'service_status_code' => 'Service Status Code',
            'address' => 'Address',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'email' => 'Email',
            'zone_no' => 'Zone No',
            'seq_no' => 'Seq No',
            'connection_category_code' => 'Connection Category Code',
            'senior_citizen' => 'Senior Citizen',
            'meter_size' => 'Meter Size',
            'account_name' => 'Account Name',
            'date_last_discon' => 'Date Last Discon',
            'date_last_recon' => 'Date Last Recon',
            'date_connected' => 'Date Connected',
            'meter_no' => 'Meter No',
        ];
    }

    /**
     * Gets query for [[Billings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillings()
    {
        return $this->hasMany(Billing::class, ['account_id' => 'id']);
    }

     /**
     * Gets query for [[ReadingDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadingData() //plural form of data is also data
    {
        return $this->hasMany(ReadingData::class, ['account_id' => 'id']);
    }
}
