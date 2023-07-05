<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%family}}`.
 */
class m230628_171540_create_family_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%family}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'pupil_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-to-parent-from-family', 'family', 'parent_id', 'user', 'id', 'CASCADE');
        $this->addForeignKey('fk-to-pupil-from-family', 'family', 'pupil_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-parent-from-family', 'family');
        $this->dropForeignKey('fk-to-pupil-from-family', 'family');
        $this->dropTable('{{%family}}');
    }
}
