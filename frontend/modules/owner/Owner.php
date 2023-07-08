<?php

namespace frontend\modules\owner;

/**
 * owner module definition class
 */
class Owner extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::configure($this, require(__DIR__ . '/config/config.php'));
        // custom initialization code goes here
    }
}
