<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meter_size".
 *
 * @property int $id
 * @property string $size
 * @property string|null $value
 * @property string|null $created_by
 * @property string $created_at
 * @property string|null $updated_by
 * @property string $updated_at
 */
class MeterSize extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meter_size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['size'], 'string', 'max' => 15],
            [['value'], 'string', 'max' => 2],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
            'value' => 'Value',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
