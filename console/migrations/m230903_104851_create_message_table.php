<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m230903_104851_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-teacher-from-message', 'message', 'teacher_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-parent-from-message', 'message', 'parent_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teacher-from-message', 'message');
        $this->dropForeignKey('fk-to-parent-from-message', 'message');
        $this->dropTable('{{%message}}');
    }
}
