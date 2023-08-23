<?php

namespace common\widgets;

use lavrentiev\widgets\toastr\Notification;
use lavrentiev\widgets\toastr\NotificationBase;
use yii\helpers\Json;
use yii\helpers\Html;

class Toastr extends NotificationBase
{
    /** @var object $session */
    private $session;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->session = \Yii::$app->session;

        $flashes = $this->session->getAllFlashes();

        foreach ($flashes as $type => $data) {
            $data = (array) $data;

            foreach ($data as $i => $message) {
                Notification::widget([
                    'type' => Html::encode($type),
                    'message' => $message,
                    'options' => Json::decode((string) $this->options),
                ]);
            }

            $this->session->removeFlash($type);
        }
    }
}