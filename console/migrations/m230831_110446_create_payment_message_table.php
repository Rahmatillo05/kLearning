<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_message}}`.
 */
class m230831_110446_create_payment_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_message}}', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull()
        ]);
        $this->insert('payment_message', [
            'message' => "Assalomu alaykum! Farzandingiz {pupil} {month} oyi uchun {payment_sum} so'm to'lov qildi. Xurmat bilan Kelajak Academy!"
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_message}}');
    }
}
