<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wait_list}}`.
 */
class m230804_162455_create_wait_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wait_list}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer(),
            'course_id' => $this->integer(),
            'full_name' => $this->string()->notNull(),
            'location' => $this->string()->notNull(),
            'phone_number' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-teacher-from-wait_list', 'wait_list', 'teacher_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-course-from-wait_list', 'wait_list', 'course_id', 'course', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teacher-from-wait_list', 'wait_list');
        $this->dropForeignKey('fk-to-course-from-wait_list', 'wait_list');
        $this->dropTable('{{%wait_list}}');
    }
}
