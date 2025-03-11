<?php

use yii\db\Migration;

/**
 * Class m240822_031858_create_inspection_subject
 */
class m240822_031858_create_inspection_subject extends Migration
{
   /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inspection_subject}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(5)->notNull(),
            'description' => $this->string(250)->notNull(),
            'created_by' => $this->string(3),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'updated_by' => $this->string(3),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%inspection_subject}}');
    }
}
