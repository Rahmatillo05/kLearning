<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about}}`.
 */
class m230818_093537_create_about_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about}}', [
            'id' => $this->primaryKey(),
            'first_image' => $this->string()->notNull(),
            'last_image' => $this->string()->notNull(),
            'motiv' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%about}}');
    }
}
