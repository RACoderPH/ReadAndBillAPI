<?php

use yii\db\Migration;

class m330524_301461_reading_schedule extends Migration
{
    public function up()
    {
        $this->createTable('reading_schedule', [
            'id' => $this->primaryKey(),
            'monthof' => $this->string(20)->notNull(),            
            'yearof' => $this->string(20)->notNull(),
            'zone' => $this->string(5)->notNull(),
	'last_reading_date' => $this->date()->notNull(),
	'reading_date' => $this->date()->notNull(),
            'due_date' => $this->date()->notNull(),
            'discon_date' => $this->date()->notNull(),
            'duedate_800' => $this->date()->notNull(),
	'meter_reader' => $this->string(250)->notNull(),
	'inspector' => $this->string(250)->notNull(),
	'updated_by' => $this->string(250)->notNull(),
            'lastupdate' => $this->dateTime()->notNull(),
            'sent' => $this->tinyInteger(1)->notNull(),
            'jono' => $this->string(20)->notNull(),
            'day' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),           
        ]);

        //$this->addForeignKey(
        //    'fk-billing-account_id',  // Name of the foreign key constraint
        //    'billing',                  // Name of the table with the foreign key
        //    'account_id',               // Name of the foreign key column
        //    'account',                  // Name of the referenced table
        //    'id',                       // Name of the referenced column
        //    'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        //);

        // Insert data
        // $this->batchInsert('billing', ['id', 'name', 'phone', 'email'], [
        //     [1, 'Aldrin', '01', 'ignaaldrin@gmail.com'],
        
        // ]);

    }

}
