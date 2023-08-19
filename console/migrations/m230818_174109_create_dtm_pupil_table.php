<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dtm_pupil}}`.
 */
class m230818_174109_create_dtm_pupil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dtm_pupil}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'subject_1' => $this->string()->notNull(),
            'subject_2' => $this->string()->notNull(),
            'dtm_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk-to-dtm-from-pupils', 'dtm_pupil', 'dtm_id', 'dtm', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-dtm-from-pupils', 'dtm_pupil');
        $this->dropTable('{{%dtm_pupil}}');
    }
}
