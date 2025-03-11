<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%classification}}`.
 */
class m240916_054045_create_classification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%classification}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(15)->notNull(),
            'value' => $this->string(2),            
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
        $this->dropTable('{{%classification}}');
    }
}
