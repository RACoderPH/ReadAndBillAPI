<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mobile_user".
 *
 * @property int $id
 * @property string $id_no
 * @property string $nickname
 * @property string $password_hash
 * @property string $access_type
 * @property string $created_at
 * @property string|null $created_by
 * @property string $updated_at
 * @property string|null $updated_by
 */
class MobileUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mobile_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_no', 'nickname', 'password_hash', 'access_type','status'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_no', 'created_by', 'updated_by'], 'string', 'max' => 3],
            [['nickname', 'password_hash', 'access_type'], 'string', 'max' => 255],
            [['id_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_no' => 'Id No',
            'nickname' => 'Nickname',
            'password_hash' => 'Password Hash',
            'access_type' => 'Access Type',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
