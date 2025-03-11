<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meter_size}}`.
 */
class m240916_054427_create_meter_size_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meter_size}}', [
            'id' => $this->primaryKey(),
            'size' => $this->string(15)->notNull(),
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
        $this->dropTable('{{%meter_size}}');
    }
}
