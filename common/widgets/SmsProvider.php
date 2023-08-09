<?php

namespace common\widgets;

use rahmatullo\eskizsms\Eskiz;
use Yii;

class SmsProvider
{
    public static Eskiz $eskiz;

    /**
     * @throws \ErrorException
     */
    public function __construct()
    {
        self::$eskiz = new Eskiz(Yii::$app->params['eskiz_email'], Yii::$app->params['eskiz_key']);
    }


}