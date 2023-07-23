<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher_social_accounts}}`.
 */
class m230723_122729_create_teacher_social_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_social_accounts}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'telegram' => $this->string(),
            'email' => $this->string(),
            'instagram' => $this->string(),
            'youtube' => $this->string(),
            'facebook' => $this->string(),
            'others' => $this->string(),
        ]);
        $this->addForeignKey('fk-to-user-from-teacher_social_accounts', 'teacher_social_accounts', 'user_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-user-from-teacher_social_accounts', 'teacher_social_accounts');
        $this->dropTable('{{%teacher_social_accounts}}');
    }
}
