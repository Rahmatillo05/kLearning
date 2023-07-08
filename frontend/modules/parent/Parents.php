<?php

namespace frontend\modules\parent;

/**
 * parent module definition class
 */
class Parents extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        \Yii::configure($this, require(__DIR__ . '/config/config.php'));

    }
}
