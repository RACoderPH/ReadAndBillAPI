<?php

use yii\db\Migration;

class m330524_301450_account extends Migration
{
    public function up()
    {
        $this->createTable('account', [
            'id' => $this->primaryKey(),
	    'sin' => $this->string(250)->notNull(),	
		'service_status_code' => $this->string(10)->notNull(),
	'address' => $this->string(250)->notNull(),
            'lastname' => $this->string(250)->notNull(),
'firstname' => $this->string(250)->notNull(),
'middlename' => $this->string(250)->notNull(),
'birthday'=> $this->date(),
'phone' => $this->string(250)->notNull(),
    'email'=> $this->string(250),
'zone_no' => $this->string(250)->notNull(),
'seq_no' => $this->string(250)->notNull(),
'connection_category_code' => $this->string(250)->notNull(),  
'senior_citizen' => $this->boolean()->notNull(),
'senior_citizen_expiry_date'=> $this->date(),
'meter_size' => $this->string(4)->notNull(),
'account_name' => $this->string(250)->notNull(), 
    'date_last_discon'=> $this->date(),
    'date_last_recon'=> $this->date(), 
    'date_connected'=> $this->date(),       
	   'meter_no' => $this->string(250)->notNull(),
       'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        

    }

}
