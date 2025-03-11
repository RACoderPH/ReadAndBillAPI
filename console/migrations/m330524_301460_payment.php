<?php

use yii\db\Migration;

class m330524_301460_payment extends Migration
{
    public function up()
    {
        $this->createTable('payment', [
            'id' => $this->primaryKey(),
            'billing_id' => $this->integer()->notNull(),
            'agent_id' => $this->integer()->notNull(),
            'date_issued' => $this->date()->notNull(),            
            'remarks' => $this->string(250),
            'reference' => $this->string(50),
            'payment_type' => $this->string(50),
            'amount_paid' => $this->float(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),       
        ]);

        $this->addForeignKey(
            'fk-payment-billing_id',  // Name of the foreign key constraint
            'payment',                  // Name of the table with the foreign key
            'billing_id',               // Name of the foreign key column
            'billing',                  // Name of the referenced table
            'id',                       // Name of the referenced column
            'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        );

        $this->addForeignKey(
            'fk-payment-agent_id',  // Name of the foreign key constraint
            'payment',                  // Name of the table with the foreign key
            'agent_id',               // Name of the foreign key column
            'agent',                  // Name of the referenced table
            'id',                       // Name of the referenced column
            'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        );

    }

}
