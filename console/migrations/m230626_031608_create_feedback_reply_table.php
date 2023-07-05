<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback_reply}}`.
 */
class m230626_031608_create_feedback_reply_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback_reply}}', [
            'id' => $this->primaryKey(),
            'course_feedback_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'reply_msg' => $this->text(),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-feedback-from-reply', 'feedback_reply', 'course_feedback_id', 'course_review', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-feedback-from-reply', 'feedback_reply');
        $this->dropTable('{{%feedback_reply}}');
    }
}
