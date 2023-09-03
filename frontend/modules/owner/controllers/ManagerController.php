<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\user\TeacherSocialAccounts;
use common\models\user\User;
use common\models\user\UserInfo;
use common\widgets\dataProvider;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\base\Exception;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ManagerController extends BaseController
{
    public function actionIndex(): string
    {
        $data = dataProvider::Manager();
        return $this->render('index',compact('data'));
    }
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        if ($model->role == Detect::TEACHER) {
            $teacher_info = UserInfo::findOne(['user_id' => $model->id]) ?? new UserInfo();
            $teacher_social_account = TeacherSocialAccounts::findOne(['user_id' => $model->id]) ?? new TeacherSocialAccounts();
            return $this->render('teacher_view', compact('model', 'teacher_social_account', 'teacher_info'));
        }
        return $this->render('view', compact('model'));
    }
    /**
     * @throws Exception
     */
    public function actionCreate()
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

    /**
     * @throws NotFoundHttpException
     */
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
    protected function findModel(int $id): User
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}