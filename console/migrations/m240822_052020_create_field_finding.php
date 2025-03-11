<?php

use yii\db\Migration;

/**
 * Class m240822_052020_create_field_finding
 */
class m240822_052020_create_field_finding extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%field_finding}}', [
            'id' => $this->primaryKey(),
            'ff_code' => $this->string(5)->notNull(),
            'description' => $this->string(250)->notNull(),
            'is_average' => $this->boolean(),
            'with_reading' => $this->boolean(),
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
        $this->dropTable('{{%field_finding}}');
    }
}
