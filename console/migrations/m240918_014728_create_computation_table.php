<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%computation}}`.
 */
class m240918_014728_create_computation_table extends Migration
{
   /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%computation}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(10)->notNull(),
            'description' => $this->string(250)->notNull(),
            'computation' => $this->string(250)->notNull(),
            'created_by' => $this->string(3),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_by' => $this->string(3),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%computation}}');
    }
}
