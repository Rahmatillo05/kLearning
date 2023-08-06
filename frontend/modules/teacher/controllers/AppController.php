<?php

namespace frontend\modules\teacher\controllers;

use common\models\groups\Room;
use common\models\groups\WaitList;
use common\widgets\Detect;
use Yii;
use yii\data\ActiveDataProvider;
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

    public function actionNotification(): string
    {
        $wait_list = new ActiveDataProvider([
            'query' => WaitList::find()->where(['teacher_id' => Yii::$app->user->id, 'status' => Detect::STATUS_ACTIVE])
        ]);
        return $this->render('notification', compact('wait_list'));
    }
}