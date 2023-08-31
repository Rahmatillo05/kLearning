<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m230831_003939_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'pupil_id' => $this->integer()->notNull(),
            'amount' => $this->float(1)->notNull(),
            'payment_type' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-teacher-from-payment', 'payment', 'teacher_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-group-from-payment', 'payment', 'group_id', 'group', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-pupil-from-payment', 'payment', 'pupil_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teacher-from-payment', 'payment');
        $this->dropForeignKey('fk-to-group-from-payment', 'payment');
        $this->dropForeignKey('fk-to-pupil-from-payment', 'payment');
        $this->dropTable('{{%payment}}');
    }
}
