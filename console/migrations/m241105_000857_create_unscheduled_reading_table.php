<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unscheduled_reading}}`.
 */
class m241105_000857_create_unscheduled_reading_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unscheduled_reading}}', [
            'id' => $this->primaryKey(),
            'meter_no' => $this->text()->notNull(),
            'reading' => $this->integer()->notNull(),
            'remarks' => $this->text(),
            'zone' => $this->text()->notNull(),
            'reading_date' => $this->date()->notNull(),
            'status' => $this->string(30)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->string(3),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),      
        'updated_by' => $this->string(3),    
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%unscheduled_reading}}');
    }
}
