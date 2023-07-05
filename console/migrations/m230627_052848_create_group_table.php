<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m230627_052848_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-teacher-from-group', 'group', 'teacher_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teacher-from-group', 'group');
        $this->dropTable('{{%group}}');
    }
}
