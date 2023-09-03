<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\groups\Family;
use common\models\groups\FamilyList;
use common\models\groups\WaitList;
use common\models\user\TeacherSocialAccounts;
use common\models\user\User;
use common\models\user\UserInfo;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class PupilController extends BaseController
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['role' => Detect::PUPIL]),

            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]

            ]);
             return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        $family = Family::findOne(['pupil_id' => $id]);
        return $this->render('view', compact('model','family'));
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionCreate(): Response|string
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->username = Tools::generateUsername($model->full_name);
                $model->setPassword($model->username);
                $model->generateAuthKey();
                if ($model->save()) {
                    if (\Yii::$app->request->post('search')){
                        WaitList::findOne(\Yii::$app->request->post('search'))->delete();
                    }
                    else{
                        return $model->role == Detect::PUPIL ? $this->redirect(['add-parent', 'pupil_id' => $model->id]) : $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @throws Exception
     */
    public function actionAddParent(int $pupil_id): string|Response
    {
        $this->layout = 'blank';
        $model = new User();
        if ($model->load($this->request->post())) {
            $model->username = Tools::generateUsername($model->full_name);
            $model->setPassword($model->username);
            $model->generateAuthKey();
            if ($model->save() && $model->createFamily($pupil_id)) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('_addForm', compact('model'));
    }

    public function actionDelete(int $id): Response
    {
        $user = $this->findModel($id);
        $user->status = User::STATUS_DELETED;
        $user->save();
        return $this->redirect(['index']);
    }
    public function actionSearch(int $id): string
    {

        $response = WaitList::findOne(['id' => $id, 'status' => Detect::REPLY]);

        return Json::encode($response);

    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel(int $id): User
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}