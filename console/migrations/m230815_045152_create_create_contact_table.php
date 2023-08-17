<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%create_contact}}`.
 */
class m230815_045152_create_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%create_contact}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(64),
            'email' => $this->string(64),
            'title' => $this->string(32),
            'body' => $this->string(255),
            'status' => $this->integer(),
            'rating' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%create_contact}}');
    }
}
