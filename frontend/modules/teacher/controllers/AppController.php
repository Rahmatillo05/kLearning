<?php

namespace frontend\modules\teacher\controllers;

use common\models\groups\Room;
use Yii;
use yii\web\Controller;
use yii\web\ErrorAction;

class AppController extends Controller
{
    public function actions()
    {
        return [
          'error' => [
              'class' => ErrorAction::class
          ]
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionMyRoom(): string
    {
        $room = Room::findOne(['responsible' => Yii::$app->user->id]);
        return $this->render('my-room', compact('room'));
    }
}