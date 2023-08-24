<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\course\Course;
use common\models\groups\FamilyList;
use common\models\groups\Group;
use common\models\groups\LessonSchedule;
use common\models\groups\WaitList;
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
        $groups = Tools::ActiveGroups();
        return $this->render('view',[
            'model' => $model,
            'dataProvider' => $dataProvider,
            'groups' => $groups
        ]);
    }
    public function actionLessonSchedule(int $group_id): Response|string
    {
        $model = LessonSchedule::findOne(['group_id' => $group_id]) ?? new LessonSchedule();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('success', 'New schedule already set');
                return $this->redirect(['view', 'id' => $group_id]);
            }
        }
        $model->group_id = $group_id;
        return $this->render('_lesson-schedule', [
            'model' => $model,
        ]);
    }
    public function action_view(int $id): Response|string
    {
        $group = $this->GroupModel($id);
        $family = new FamilyList();
        $family->group_id = $group->id;
        $schedule = LessonSchedule::findOne(['group_id' => $group->id]);
        if ($family->load($this->request->post())) {
            if ($family->pupilIsSet() && $family->save()) {
                Yii::$app->session->setFlash('success', 'New Pupil added');
            } else {
                Yii::$app->session->setFlash('danger', 'This pupil has already added');
            }
            return $this->refresh();
        }
        $pupil_list = FamilyList::findAll(['group_id' => $group->id]);
        return $this->render('_view', compact('family', 'pupil_list', 'group', 'schedule'));
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionCourse(int $id): string
    {

        $dataProvider = new ActiveDataProvider([
            'query' => WaitList::find()->where(['course_id' => 'teacher_id']),

            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]

        ]);
        return $this->render('course', [
            'model' => $this->CoursesModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    private function GroupModel(int $id): ?Group
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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
     * @throws NotFoundHttpException
     */
    protected function CoursesModel(int $id): Course
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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