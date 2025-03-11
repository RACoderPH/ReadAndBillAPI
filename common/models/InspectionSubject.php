<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inspection_subject".
 *
 * @property int $id
 * @property string $code
 * @property string $Description
 * @property string|null $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $updated_by
 */
class InspectionSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inspection_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'description'], 'required'],
            [['code', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
            'code' => 'Code',
            'description' => 'description',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
