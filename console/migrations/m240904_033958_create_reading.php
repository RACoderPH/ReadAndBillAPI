<?php

use yii\db\Migration;

/**
 * Class m240904_033958_create_reading
 */
class m240904_033958_create_reading extends Migration
{
    public function up()
    {
        $this->createTable('reading', [
            'id' => $this->primaryKey(),
            'schedule_id' => $this->integer()->notNull(),
            'reading' => $this->integer()->notNull(),
            'consumed' => $this->integer()->notNull(),
            'wb' => $this->double()->notNull(),
            'sr_wb' => $this->double()->notNull(),
            'sf' => $this->double()->notNull(),
            'sr_sf' => $this->double()->notNull(),
            'wb_pen' => $this->double()->notNull(),
            'sf_pen' => $this->double()->notNull(),
            'ff_id' => $this->integer()->notNull(),
            'remarks' => $this->string(250),
            'location_id' => $this->integer()->notNull(),
            'inspection_subject_id' => $this->integer()->notNull(),
            'is_average' => $this->boolean()->notNull(),
            'is_open' => $this->boolean()->notNull(),
            'total_amount' => $this->double()->notNull(),
            'consumption_status' => $this->string(1)->notNull(),
            'soa_number' => $this->string(6)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_by' => $this->string(3),
        'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),      
        'updated_by' => $this->string(3),     
        ]);

        $this->addForeignKey(
            'fk_reading_schedule_id',  // Name of the foreign key constraint
            'reading',                  // Name of the table with the foreign key
            'schedule_id',               // Name of the foreign key column
            'schedule',                  // Name of the referenced table
            'id',                       // Name of the referenced column
            'CASCADE',
            'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
         );

        // $this->addForeignKey(
        //     'fk_reading_field_finding_id', // Unique name for the constraint
        //     'reading',
        //     'ff_id',
        //     'field_finding',
        //     'id',
        //     'CASCADE',
        //     'CASCADE'
        // );

        //  $this->addForeignKey(
        //     'fk_foreign_key_table_related_table',
        //     'foreign_key_table',
        //     'related_table_id',
        //     'related_table',
        //     'id',
        //     'CASCADE',
        //     'CASCADE'
        // );

        // $this->addForeignKey(
        //     'fk_reading_inspection_subject-id',  // Name of the foreign key constraint
        //     'reading',                  // Name of the table with the foreign key
        //     'inspection_subject_id',               // Name of the foreign key column
        //     'inspection_subject',                  // Name of the referenced table
        //     'id',                       // Name of the referenced column
        //     'CASCADE',
        //     'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        // );

        // $this->addForeignKey(
        //    'fk-reading-location_id',  // Name of the foreign key constraint
        //    'reading',                  // Name of the table with the foreign key
        //    'location_id',               // Name of the foreign key column
        //    'location',                  // Name of the referenced table
        //    'id',                       // Name of the referenced column
        //    'CASCADE'                   // Action to take on delete (CASCADE deletes related records)
        // );

        
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reading}}');
    }
}
