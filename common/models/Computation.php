<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "computation".
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $computation
 * @property string|null $created_by
 * @property string $created_at
 * @property string|null $updated_by
 * @property string $updated_at
 */
class Computation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'computation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'description', 'computation'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 10],
            [['description', 'computation'], 'string', 'max' => 250],
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
            'description' => 'Description',
            'computation' => 'Computation',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
