<?php

namespace frontend\modules\manager\controllers;

use common\models\course\Category;
use common\models\course\Course;
use common\models\groups\WaitList;
use common\models\sms\Sms;
use common\models\user\User;
use common\widgets\Detect;
use common\widgets\SmsProvider;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;
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

    /**
     * Summary of actionIndex
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Summary of actionNotification
     * @return string
     */
    public function actionNotification(): string
    {
        $wait_list = new ActiveDataProvider([
            'query' => WaitList::find(),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ]
        ]);
        $data = User::find()->where(['teacher_id' => Yii::$app->user->id]);  
        return $this->render('notification', compact('wait_list', 'data'));
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
        return $this->redirect('index');
    }
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
    public function actionCreate(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
            'pagination' => [
                'pageSize' => 12
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('create', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);

        $categories = Category::findAll(['status' => Detect::STATUS_ACTIVE]);
        $wait_list = new WaitList();
        $wait_list->teacher_id = $model->teacher_id;
        $wait_list->course_id = $model->id;
        return $this->render('view', [
            'model' => $model,
            'categories' => $categories,
            'wait_list' => $wait_list
        ]);
    }

    public function actionWaitList(): Response
    {
        $model = new WaitList();

        if ($model->load(Yii::$app->request->post())) {
            $user = WaitList::findOne([
                'course_id' => $model->course_id,
                'teacher_id' => $model->teacher_id,
                'full_name' => $model->full_name
            ]);
            if (!$user) {
                if ($model->validate() && $model->save()) {
                    Yii::$app->session->setFlash('success', "Murojatingiz uchun rahmat! Tez orada siz bilan bog'lanishadi!");
                    return $this->redirect(Yii::$app->request->referrer);
                } else {
                    Yii::$app->session->setFlash('error', "Saqlashda xatolik yuz berdi! Iltimos qaytadan urinib ko'ring!");
                    return $this->redirect(Yii::$app->request->referrer);
                }
            } else{
                Yii::$app->session->setFlash('error', "Siz allaqachon qabul ro'yhatida mavjudsiz!");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        return $this->goBack();
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}