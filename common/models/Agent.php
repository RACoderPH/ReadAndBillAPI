<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "agent".
 *
 * @property int $id
 * @property string $code
 * @property string $company_name
 * @property int $contact_no
 * @property string|null $email
 * @property string|null $address
 * @property string $api_key
 *
 * @property Payment[] $payments
 */
class Agent extends \yii\db\ActiveRecord
{
    const TYPE_ADMIN = 'admin';
    const TYPE_PARTNER = 'partner';
    
    const ENCRYPTION_KEY = 'x0dCuPC93uTTWd1P3KT40Js4AKqNpE99';

    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'company_name', 'contact_no', 'type'], 'required'],            
            [['code', 'company_name', 'email', 'contact_no', 'address', 'type'], 'string', 'max' => 250],            
            ['api_key_hash', 'unique', 'message' => 'API key must be unique.'],
        ];
    }
    

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            //Handles the encryption and hashing of the API key before saving it to the database.
            if ($insert) { // Check if this is a new record
                $api_key = \Yii::$app->security->generateRandomString(32); // Generate a 32-character random string
                $this->api_key_encrypted = \Yii::$app->security->encryptByPassword($api_key, self::ENCRYPTION_KEY);                
                $this->api_key_hash = self::generateApiKeyHash($api_key);
            }
            return true;
        }
        return false;
    }
    

    
    /**
     * Finds an agent model by their API api_key_hash without the need to decrypt the api_key_encrypted field, thus more resource efficient     
     *
     * @param string $apiKey The plain API key provided by the user.
     * @return Agent|null The found agent, or null if none found.
     */
    public static function findByApiKey($apiKey)
    {   
        $apiKeyHash = self::generateApiKeyHash($apiKey);
        return self::findOne(['api_key_hash' => $apiKeyHash]);
    }


    /**
     * Retrieves the decrypted API key.
     * This is the raw API key string, decrypted from the encrypted value stored in the database.
     * Use this method to access the API key via $model->api_key in a secure and encapsulated manner.
     * 
     * @return string The decrypted API key.
     */
    public function getApi_key()
    {
        return \Yii::$app->security->decryptByPassword($this->api_key_encrypted, self::ENCRYPTION_KEY);
    }

    

     /**
     * Generates a secure hash for the API key using SHA-256.
     * This method is static because it does not depend on instance data.
     *
     * @param string $apiKey The API key to hash.
     * @return string The consistent, secure hash of the API key.
     */
    protected static function generateApiKeyHash($apiKey)
    {
        return hash('sha256', $apiKey);
    }



     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'company_name' => 'Company Name',
            'contact_no' => 'Contact No',
            'email' => 'Email',
            'address' => 'Address',
            'api_key' => 'Api Key',
        ];
    }


    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::class, ['agent_id' => 'id']);
    }




}
