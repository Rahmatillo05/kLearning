<?php

namespace frontend\modules\pupil;

/**
 * pupil module definition class
 */
class Pupil extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\pupil\controllers';

    public function init(): void
    {
        parent::init();

        \Yii::configure($this, require(__DIR__ . '/config/config.php'));
    }
}
