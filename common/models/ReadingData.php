<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reading_data".
 *
 * @property int $id
 * @property int $account_id
 * @property int $reading_schedule_id
 * @property string $account_no
 * @property string $previous_date
 * @property int $previous_reading
 * @property int $average_usage
 * @property int|null $old_meter_usage
 * @property float|null $advance_payment
 * @property float|null $wb_arrears
 * @property float|null $sf_arrears
 * @property float|null $total_arrears
 * @property float|null $mm_arrears
 * @property float|null $pn_nc
 * @property float|null $pn_nc_count
 * @property float|null $pn_wb
 * @property float|null $pn_wb_count
 * @property float|null $violation
 * @property int $oldmeter_presreading
 * @property int $oldmeter_prevreading
 * @property string $meter_installation_date
 * @property string $announcements
 * @property string $ffcode
 * @property string $prevremarks
 *
 * @property Account $account
 * @property ReadingData $readingSchedule
 */
class ReadingData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reading_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'reading_schedule_id', 'account_no', 'previous_date', 'previous_reading', 'average_usage', 'oldmeter_presreading', 'oldmeter_prevreading', 'meter_installation_date', 'announcements', 'ffcode', 'prevremarks'], 'required'],
            [['account_id', 'reading_schedule_id', 'previous_reading', 'average_usage', 'old_meter_usage', 'oldmeter_presreading', 'oldmeter_prevreading'], 'integer'],
            [['previous_date', 'meter_installation_date'], 'safe'],
            [['advance_payment', 'wb_arrears', 'sf_arrears', 'total_arrears', 'mm_arrears', 'pn_nc', 'pn_nc_count', 'pn_wb', 'pn_wb_count', 'violation'], 'number'],
            [['account_no', 'prevremarks'], 'string', 'max' => 50],
            [['announcements'], 'string', 'max' => 500],
            [['ffcode'], 'string', 'max' => 10],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::class, 'targetAttribute' => ['account_id' => 'id']],
            [['reading_schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReadingData::class, 'targetAttribute' => ['reading_schedule_id' => 'id']],
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
            'reading_schedule_id' => 'Reading Schedule ID',
            'account_no' => 'Account No',
            'previous_date' => 'Previous Date',
            'previous_reading' => 'Previous Reading',
            'average_usage' => 'Average Usage',
            'old_meter_usage' => 'Old Meter Usage',
            'advance_payment' => 'Advance Payment',
            'wb_arrears' => 'Wb Arrears',
            'sf_arrears' => 'Sf Arrears',
            'total_arrears' => 'Total Arrears',
            'mm_arrears' => 'Mm Arrears',
            'pn_nc' => 'Pn Nc',
            'pn_nc_count' => 'Pn Nc Count',
            'pn_wb' => 'Pn Wb',
            'pn_wb_count' => 'Pn Wb Count',
            'violation' => 'Violation',
            'oldmeter_presreading' => 'Oldmeter Presreading',
            'oldmeter_prevreading' => 'Oldmeter Prevreading',
            'meter_installation_date' => 'Meter Installation Date',
            'announcements' => 'Announcements',
            'ffcode' => 'Ffcode',
            'prevremarks' => 'Prevremarks',
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
     * Gets query for [[ReadingSchedule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadingSchedule()
    {
        return $this->hasOne(ReadingSchedule::class, ['id' => 'reading_schedule_id']);
    }

    // public static function getDataForChart() {
    //     // Build your query here
    //     $data = self::find()
    //       ->select(['account_id', 'SUM(id) AS value']) // Use SUM to aggregate values
    //       ->groupBy('account_id')
    //       ->asArray()
    //       ->all();
    //     return $data;
    //   }

    //   public static function getDataForChart() {
    //     // Assuming you have an 'id' attribute in your ReadingData model
    //     $count = self::find()->count();
    //     return ['count' => $count]; // Return an array with the count
    //   }
      
      
}
