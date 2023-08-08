<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sms_dispatch}}`.
 */
class m230808_174017_create_sms_dispatch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sms_dispatch}}', [
            'id' => $this->primaryKey(),
            'dispatch_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sms_dispatch}}');
    }
}
