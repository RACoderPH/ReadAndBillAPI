<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $schedule_id
 * @property resource $photo
 * @property string|null $filename
 * @property string|null $original_filename
 * @property int|null $size
 * @property string $created_at
 * @property string|null $created_by
 * @property string $updated_at
 * @property string|null $updated_by
 *
 * @property Schedule $schedule
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'photo'], 'required'],
            [['schedule_id', 'size'], 'integer'],
            [['photo'], 'blob'],
            [['created_at', 'updated_at'], 'safe'],
            [['filename', 'original_filename'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
            [['schedule_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schedule::class, 'targetAttribute' => ['schedule_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schedule_id' => 'Schedule ID',
            'photo' => 'Photo',
            'filename' => 'Filename',
            'original_filename' => 'Original Filename',
            'size' => 'Size',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Schedule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::class, ['id' => 'schedule_id']);
    }
}
