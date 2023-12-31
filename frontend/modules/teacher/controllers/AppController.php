<?php

namespace frontend\modules\teacher\controllers;

use common\models\groups\Room;
use common\models\groups\WaitList;
use common\models\sms\Sms;
use common\widgets\Detect;
use common\widgets\SmsProvider;
use ErrorException;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

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
            'query' => WaitList::find()->where(['teacher_id' => Yii::$app->user->id, 'status' => Detect::NOT_REPLY]),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ]
        ]);
        return $this->render('notification', compact('wait_list'));
    } 

    /**
     * @throws ErrorException
     */
    public function actionSendSms(): Response|string
    {
        $request = Yii::$app->request->get();
        if (isset($request['selection'])) {
            $model = new Sms();
            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
                if ($model->sendMessage($request['selection'])) {
                    Yii::$app->session->setFlash('success', "Xabarlar jo'natildi!");
                    return $this->redirect(['index']);
                }
                Yii::$app->session->setFlash('danger', "Xabarlarni jo'natishda xatolik yuz berdi!");
                return $this->redirect(['notification']);
            }
            return $this->render('sms-message', compact('model'));
        }
        Yii::$app->session->setFlash('danger', "Bironta ham qator tanlanmagan!");
        return $this->redirect(['notification']);
    }

    public function actionMessages(): string
    {
        $messages = (new SmsProvider())::$eskiz->getMessages();
        $messages = json_decode(json_encode($messages), true);
        return $this->render('message', compact('messages'));
    }

   
    public function actionCalled($id): Response
    {
        $model = WaitList::findOne($id);
        $model->status = Detect::REPLY;
        if ($model->save()){
            Yii::$app->session->setFlash('success', 'O\'quvchi ogohlantirildi');
        } else{
            Yii::$app->session->setFlash('danger', 'O\'quvchi ogohlantirishni saqlashda xatolik yuz berdi');
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

}