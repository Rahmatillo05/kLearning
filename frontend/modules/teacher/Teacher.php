<?php

namespace frontend\modules\teacher;

use yii\base\Module;

/**
 * teacher module definition class
 */
class Teacher extends Module
{


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::configure($this, require(__DIR__ . '/config/config.php'));
    }
}
