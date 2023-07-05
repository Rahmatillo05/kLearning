<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson_schedule}}`.
 */
class m230703_110455_create_lesson_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_schedule}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'room_id' => $this->integer(),
            'monday' => $this->string(),
            'tuesday' => $this->string(),
            'wednesday' => $this->string(),
            'thursday' => $this->string(),
            'friday' => $this->string(),
            'saturday' => $this->string(),
            'sunday' => $this->string()
        ]);
        $this->addForeignKey('fk-to-group-from-lesson_schedule', 'lesson_schedule', 'group_id', 'group', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-room-from-lesson_schedule', 'lesson_schedule', 'room_id', 'room', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-group-from-lesson_schedule', 'lesson_schedule');
        $this->dropForeignKey('fk-to-room-from-lesson_schedule', 'lesson_schedule');
        $this->dropTable('{{%lesson_schedule}}');
    }
}
