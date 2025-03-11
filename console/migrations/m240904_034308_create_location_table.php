<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%location}}`.
 */
class m240904_034308_create_location_table extends Migration
{
    public function up()
    {
        $this->createTable('location', [
            'id' => $this->primaryKey(),
            'coordinates' => $this->string(5)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->string(3),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'), 
        'updated_by' => $this->string(3),          
        ]);    


    }
}
