<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m230622_000400_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'first_lesson' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-teacher-from-course', 'course', 'teacher_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-category-from-course', 'course', 'category_id', 'category', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teacher-from-course', 'course');
        $this->dropForeignKey('fk-to-category-from-course', 'course');
        $this->dropTable('{{%course}}');
    }
}
