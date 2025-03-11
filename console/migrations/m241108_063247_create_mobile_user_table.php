<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mobile_user}}`.
 */
class m241108_063247_create_mobile_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mobile_user}}', [
            'id' => $this->primaryKey(),
            'id_no' => $this->string(3)->notNull()->unique(),
            'nickname' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'access_type' => $this->string()->notNull(),           
            'status' => $this->boolean()->notNull(), 
        'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        'created_by' => $this->string(3),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        'updated_by' => $this->string(3),     
        
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mobile_user}}');
    }
}
