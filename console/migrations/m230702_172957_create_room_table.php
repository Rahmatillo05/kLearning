<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room}}`.
 */
class m230702_172957_create_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'number' => $this->integer()->notNull(),
            'capacity' => $this->integer()->notNull(),
            'responsible' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk-to-teachers-from-rooms', 'room', 'responsible', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-teachers-from-rooms', 'room');
        $this->dropTable('{{%room}}');
    }
}
