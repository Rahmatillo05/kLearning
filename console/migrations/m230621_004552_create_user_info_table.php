<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_info}}`.
 */
class m230621_004552_create_user_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_info}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'image' => $this->string(),
            'about' => $this->text()->notNull(),
            'education' => $this->text()->notNull(),
            'experience' => $this->text()->notNull(),
            'job' => $this->string()->notNull(),
            'social_media' => $this->text()
        ]);
        $this->addForeignKey('fk-to-user-from-user_info', 'user_info', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-user-from-user_info', 'user_info');
        $this->dropTable('{{%user_info}}');
    }
}
