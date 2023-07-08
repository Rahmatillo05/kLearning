<?php

namespace frontend\modules\manager;

/**
 * Manager module definition class
 */
class Manager extends \yii\base\Module
{

    public function init()
    {
        parent::init();
        \Yii::configure($this, require(__DIR__ . '/config/config.php'));

        // custom initialization code goes here
    }
}
