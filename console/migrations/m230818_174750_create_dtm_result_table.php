<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dtm_result}}`.
 */
class m230818_174750_create_dtm_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dtm_result}}', [
            'id' => $this->primaryKey(),
            'dtm_id' => $this->integer(),
            'pupil_id' => $this->integer(),
            'subject_1' => $this->float(1)->defaultValue(0),
            'subject_2' => $this->float(1)->defaultValue(0),
            'require_subject' => $this->float(1)->defaultValue(0),
            'total' => $this->float(1)->defaultValue(0)
        ]);
        $this->addForeignKey('fk-to-dtm-from-dtm_result', 'dtm_result','dtm_id','dtm','id', 'CASCADE');
        $this->addForeignKey('fk-to-dtm_pupils-from-dtm_result', 'dtm_result','pupil_id','dtm_pupil','id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-to-dtm-from-dtm_result', 'dtm_result');
        $this->dropForeignKey('fk-to-dtm_pupils-from-dtm_result', 'dtm_result');
        $this->dropTable('{{%dtm_result}}');

    }
}
