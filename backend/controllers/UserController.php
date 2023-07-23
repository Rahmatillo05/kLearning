<?php

namespace backend\controllers;

use common\models\user\TeacherSocialAccounts;
use common\models\user\User;
use common\models\user\UserInfo;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),

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
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        if ($model->role == Detect::TEACHER) {
            $teacher_info = UserInfo::findOne(['user_id' => $model->id])  ?? new UserInfo();
            $teacher_social_account = TeacherSocialAccounts::findOne(['user_id' => $model->id]) ?? new TeacherSocialAccounts();
            return $this->render('teacher_view', compact('model','teacher_social_account', 'teacher_info'));
        }
        return $this->render('view', compact('model'));
    }

    public function actionTeacherInfo(int $id)
    {

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
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
        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id): Response
    {
        $user = $this->findModel($id);
        $user->status = User::STATUS_DELETED;
        $user->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): User
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
