<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_review}}`.
 */
class m230622_001557_create_course_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_review}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'rating' => $this->decimal(2, 1),
            'feedback' => $this->text()->notNull(),
            'is_read' => $this->smallInteger(),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-course-from-review', 'course_review', 'course_id', 'course', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-course-from-review', 'course_review');
        $this->dropTable('{{%course_review}}');
    }
}
