<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%family_list}}`.
 */
class m230628_172025_create_family_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%family_list}}', [
            'id' => $this->primaryKey(),
            'family_id' => $this->integer(),
            'group_id' => $this->integer(),
            'created_at' => $this->integer()
        ]);
        $this->addForeignKey('fk-to-family-from-family_list', 'family_list','family_id', 'family', 'id','CASCADE');
        $this->addForeignKey('fk-to-group-from-family_list', 'family_list', 'group_id', 'group', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-family-from-family_list', 'family_list');
        $this->dropForeignKey('fk-to-group-from-family_list', 'family_list');
        $this->dropTable('{{%family_list}}');

    }
}
