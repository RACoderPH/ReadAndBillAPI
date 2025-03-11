<?php

use yii\db\Migration;

class m330524_301465_photo extends Migration
{
    public function up()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'schedule_id' => $this->integer()->notNull(),
            'photo' => $this->binary()->notNull(),
            'filename' => $this->string(255),
            'original_filename' => $this->string(255),
            'size' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->string(3),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),      
            'updated_by' => $this->string(3),  
            ]);

            $this->addForeignKey(
                'fk_photo_schedule_id',  // Name of the foreign key constraint
                'photo',                  // Name of the table with the foreign key
                'schedule_id',               // Name of the foreign key column
                'schedule',                  // Name of the referenced table
                'id',                       // Name of the referenced column
                'CASCADE',
                'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
             );
    }

}

