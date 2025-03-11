<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string $sequence
 * @property string $sin
 * @property string $account_no
 * @property string $account_name
 * @property string $account_address
 * @property string $account_status
 * @property string $meter_no
 * @property string $connection_date
 * @property int $sr_citizen
 * @property string $prev_date
 * @property int $prev_reading
 * @property int $average_usage
 * @property float $wb_arrears
 * @property float $sf_arrears
 * @property float $advance
 * @property float $pn_nc
 * @property int $pn_nc_count
 * @property float $pn_wb
 * @property int $pn_wb_count
 * @property float $violation
 * @property string $reading_date
 * @property string $due_date
 * @property string $discon_due_date
 * @property string $discon_due_date_with_arrears
 * @property string|null $installation_date
 * @property int $old_meter_usage
 * @property int $old_meter_prev_reading
 * @property int $old_meter_pres_reading
 * @property string $ff_code
 * @property string $prev_remarks
 * @property string $announcement
 * @property string $meter_reader
 * @property string $status
 * @property string $email
 * @property int $soa_type
 * @property string|null $created_by
 * @property int|null $created_at
 * @property string|null $updated_by
 * @property int|null $updated_at
 *
 * @property Reading[] $readings
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sequence', 'sin', 'account_no', 'account_name', 'account_address', 'account_status', 'meter_no', 'connection_date', 'prev_date', 'prev_reading', 'average_usage', 'wb_arrears', 'sf_arrears', 'advance', 'pn_nc', 'pn_nc_count', 'pn_wb', 'pn_wb_count', 'violation', 'reading_date', 'due_date', 'discon_due_date', 'discon_due_date_with_arrears', 'old_meter_usage', 'old_meter_prev_reading', 'old_meter_pres_reading', 'ff_code',  'meter_reader', 'status'], 'required'],
            [['sequence', 'account_no', 'account_name', 'account_address', 'account_status', 'meter_no', 'connection_date', 'prev_date',  'due_date', 'discon_due_date', 'discon_due_date_with_arrears', 'installation_date', 'ff_code', 'prev_remarks', 'announcement','computation','soa_type'], 'string'],
            [[ 'prev_reading', 'average_usage', 'pn_nc_count', 'pn_wb_count', 'old_meter_usage', 'old_meter_prev_reading', 'old_meter_pres_reading', 'created_at', 'updated_at'], 'integer'],
            [['wb_arrears', 'sf_arrears', 'advance', 'pn_nc', 'pn_wb', 'violation'], 'number'],
            [['sin'], 'string', 'max' => 10],
            [['meter_reader', 'created_by', 'updated_by'], 'string', 'max' => 3],
            [['status'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
            [['reading_date','sr_citizen'], 'date', 'format' => 'php:Y-m-d'],  
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sequence' => 'Sequence',
            'sin' => 'Sin',
            'account_no' => 'Account No',
            'account_name' => 'Account Name',
            'account_address' => 'Account Address',
            'account_status' => 'Account Status',
            'meter_no' => 'Meter No',
            'connection_date' => 'Connection Date',
            'sr_citizen' => 'Sr Citizen',
            'prev_date' => 'Prev Date',
            'prev_reading' => 'Prev Reading',
            'average_usage' => 'Average Usage',
            'wb_arrears' => 'Wb Arrears',
            'sf_arrears' => 'Sf Arrears',
            'advance' => 'Advance',
            'pn_nc' => 'Pn Nc',
            'pn_nc_count' => 'Pn Nc Count',
            'pn_wb' => 'Pn Wb',
            'pn_wb_count' => 'Pn Wb Count',
            'violation' => 'Violation',
            'reading_date' => 'Reading Date',
            'due_date' => 'Due Date',
            'discon_due_date' => 'Discon Due Date',
            'discon_due_date_with_arrears' => 'Discon Due Date With Arrears',
            'installation_date' => 'Installation Date',
            'old_meter_usage' => 'Old Meter Usage',
            'old_meter_prev_reading' => 'Old Meter Prev Reading',
            'old_meter_pres_reading' => 'Old Meter Pres Reading',
            'ff_code' => 'Ff Code',
            'prev_remarks' => 'Prev Remarks',
            'announcement' => 'Announcement',
            'meter_reader' => 'Meter Reader',
            'status' => 'Status',
            'email' => 'Email',
            'soa_type' => 'Soa Type',
            'computation' => 'Computation',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Readings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadings()
    {
        return $this->hasMany(Reading::class, ['schedule_id' => 'id']);
    }

    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['schedule_id' => 'id']);
    }
}
