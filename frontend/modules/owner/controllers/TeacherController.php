<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\course\Course;
use common\models\user\User;
use common\widgets\Detect;
use common\widgets\Tools;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class TeacherController extends BaseController
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['role' => Detect::TEACHER]),

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
     * @throws Exception
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
                    return $model->role == Detect::PUPIL ? $this->redirect(['add-parent', 'pupil_id' => $model->id]) : $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete(int $id): Response
    {
        $user = $this->findModel($id);
        $user->status = User::STATUS_DELETED;
        $user->save();
        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        $dataProvider = Tools::active();
        return $this->render('view',[
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
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