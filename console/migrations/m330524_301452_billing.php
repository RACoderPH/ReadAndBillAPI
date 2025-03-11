<?php

use yii\db\Migration;

class m330524_301452_billing extends Migration
{
    public function up()
    {
        $this->createTable('billing', [
            'id' => $this->primaryKey(),
            'account_id' => $this->integer()->notNull(),
            'bill_id' => $this->string(20)->notNull(),            
            'bill_status_code' => $this->string(20)->notNull(),
            'bill_period_code' => $this->string(100)->notNull(),
            'date_period_from' => $this->date()->notNull(),
            'date_period_to' => $this->date()->notNull(),
            'date_payment_due' => $this->date()->notNull(),
            'date_discon' => $this->date()->notNull(),
            'last_reading' => $this->integer()->notNull(),
            'previous_reading' => $this->integer()->notNull(),
            'water_consumption' => $this->integer()->notNull(),
            'amount_billed' => $this->float()->notNull(),
            'amount_penalty' => $this->float()->notNull(),
            'sr_citizen_disc' => $this->float()->notNull(),
            'franchise_tax' => $this->float(),
            'adjustments' => $this->float(),
            'billed_by' => $this->string(100)->notNull(),
            'billed_on' => $this->date()->notNull(),
            'water_maintenance_fee' => $this->float(),
            'advance_payment' => $this->float(),
            'billing_type' => $this->string(100),
            'penalty_date' => $this->date(), 
	    'total_amount' => $this->float()->notNull(),      
        'longitude' => $this->string(250)->notNull(),     
'latitude' => $this->string(250)->notNull(),  
'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-billing-account_id',  // Name of the foreign key constraint
            'billing',                  // Name of the table with the foreign key
            'account_id',               // Name of the foreign key column
            'account',                  // Name of the referenced table
            'id',                       // Name of the referenced column
            'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        );

        // Insert data
        // $this->batchInsert('billing', ['id', 'name', 'phone', 'email'], [
        //     [1, 'Aldrin', '01', 'ignaaldrin@gmail.com'],
        
        // ]);

    }

}
