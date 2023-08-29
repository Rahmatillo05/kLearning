<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%main_img}}`.
 */
class m230828_061847_create_main_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%main_img}}', [
            'id' => $this->primaryKey(),
            'main_img' => $this->string()->notNull(),
            'banners' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'motiv' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%main_img}}');
    }
}
