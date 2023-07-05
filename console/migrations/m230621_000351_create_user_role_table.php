<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_role}}`.
 */
class m230621_000351_create_user_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_role}}', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(150),
            'role_power' => $this->smallInteger()
        ], $tableOptions);
        $this->insert('user_role', [
            'role_name' => 'Owner',
            'role_power' => 10,
        ]);
        $this->insert('user_role', [
            'role_name' => 'Manager',
            'role_power' => 8,
        ]);
        $this->insert('user_role', [
            'role_name' => 'Teacher',
            'role_power' => 6,
        ]);
        $this->insert('user_role', [
            'role_name' => 'Parent',
            'role_power' => 4,
        ]);
        $this->insert('user_role', [
            'role_name' => 'Pupil',
            'role_power' => 2,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_role}}');
    }
}
