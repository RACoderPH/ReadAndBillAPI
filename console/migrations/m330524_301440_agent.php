<?php

use yii\db\Migration;

class m330524_301440_agent extends Migration
{
    public function up()
    {
        $this->createTable('agent', [
            'id' => $this->primaryKey(),
            'code' => $this->string(250)->notNull(),
            'company_name' => $this->string(250)->notNull(),
            'contact_no' => $this->string(250)->notNull(),            
            'email' => $this->string(250),
            'address' => $this->string(250),
            'type' => $this->string(250)->notNull(),
            
            /* Below two fields are used for API key management:
            *  `api_key_encrypted` stores the API key in an encrypted format - this enables the system to return the original API key to the user if needed
            *  `api_key_hash` stores a hash of the API key - this hashed key is used for quick comparison during data query without the need to decrypt.
            */
            'api_key_encrypted' => $this->binary()->notNull(),
            'api_key_hash' => $this->string(255)->notNull()->unique(),
         ]);


    }

}
