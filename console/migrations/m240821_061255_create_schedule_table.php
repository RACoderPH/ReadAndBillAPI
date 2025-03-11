<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m240821_061255_create_schedule_table extends Migration
{
/**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'sequence' => $this->text()->notNull(),
            'sin' => $this->string(10)->notNull(),
            'account_no' => $this->text()->notNull(),
            'account_name' => $this->text()->notNull(),
            'account_address' => $this->text()->notNull(),
            'account_status' => $this->text()->notNull(),
            'meter_no' => $this->text()->notNull(),
            'connection_date' => $this->text()->notNull(),
            'sr_citizen' => $this->boolean()->notNull(),
            'prev_date' => $this->text()->notNull(),
            'prev_reading' => $this->integer()->notNull(),
            'average_usage' => $this->integer()->notNull(),
            'wb_arrears' => $this->decimal(10,2)->notNull(),
            'sf_arrears' => $this->decimal(10,2)->notNull(),
            'advance' => $this->decimal(10,2)->notNull(),
            'pn_nc' => $this->decimal(10,2)->notNull(),
            'pn_nc_count' => $this->integer()->notNull(),
            'pn_wb' => $this->decimal(10,2)->notNull(),
            'pn_wb_count' => $this->integer()->notNull(),
            'violation' => $this->decimal(10,2)->notNull(),
            'reading_date' => $this->date()->notNull(),
            'due_date' => $this->text()->notNull(),
            'discon_due_date' => $this->text()->notNull(),
            'discon_due_date_with_arrears' => $this->text()->notNull(),
            'installation_date' => $this->text(),
            'old_meter_usage' => $this->integer()->notNull(),
            'old_meter_prev_reading' => $this->integer()->notNull(),
            'old_meter_pres_reading' => $this->integer()->notNull(),
            'ff_code' => $this->text()->notNull(),
            'prev_remarks' => $this->text(),
            'announcement' => $this->text(),
            'meter_reader' => $this->string(3)->notNull(),
            'status' => $this->string(30)->notNull(),
            'email' => $this->string(100),
            'soa_type' => $this->integer()->notNull(),
            'computation' => $this->text(),
            'created_by' => $this->string(3),
            'created_at' => $this->integer(),
            'updated_by' => $this->string(3),
            'updated_at' => $this->integer(),
        ]);

        // $this->addForeignKey(
        //     'fk_reading_field_finding_id', // Unique name for the constraint
        //     'schedule',
        //     'ff_code',
        //     'field_finding',
        //     'id',
        //     'CASCADE',
        //     'CASCADE'
        // );
    }


    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule}}');
    }
}
