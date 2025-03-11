<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%water_rate}}`.
 */
class m240916_054850_create_water_rate_table extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%water_rate}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(15)->notNull(),
            'size' => $this->string(15)->notNull(),
            'mincm' => $this->integer()->notNull(),
            'minprice' => $this->float()->notNull(),   
            'blk1cm' => $this->integer()->notNull(),
            'blk1price' => $this->float()->notNull(),   
            'blk2cm' => $this->integer()->notNull(),
            'blk2price' => $this->float()->notNull(), 
            'blk3cm' => $this->integer()->notNull(),
            'blk3price' => $this->float()->notNull(), 
            'blk4cm' => $this->integer()->notNull(),
            'blk4price' => $this->float()->notNull(), 
            'blk5cm' => $this->integer()->notNull(),
            'blk5price' => $this->float()->notNull(),       
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
        $this->dropTable('{{%water_rate}}');
    }
}
