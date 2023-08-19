<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dtm}}`.
 */
class m230818_173803_create_dtm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dtm}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'start_date' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultExpression(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dtm}}');
    }
}
