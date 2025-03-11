<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unscheduled_photo".
 *
 * @property int $id
 * @property int $ur_id
 * @property resource $photo
 * @property string|null $filename
 * @property string|null $original_filename
 * @property int|null $size
 * @property string $created_at
 * @property string|null $created_by
 * @property string $updated_at
 * @property string|null $updated_by
 *
 * @property UnscheduledReading $ur
 */
class UnscheduledPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unscheduled_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ur_id', 'photo'], 'required'],
            [['ur_id', 'size'], 'integer'],
            [['photo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['filename', 'original_filename'], 'string', 'max' => 255],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
            [['ur_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnscheduledReading::class, 'targetAttribute' => ['ur_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ur_id' => 'Ur ID',
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
     * Gets query for [[Ur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUr()
    {
        return $this->hasOne(UnscheduledReading::class, ['id' => 'ur_id']);
    }
}
