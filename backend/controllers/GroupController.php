<?php

namespace backend\controllers;

use common\models\groups\FamilyList;
use common\models\groups\Group;
use common\models\groups\LessonSchedule;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends BaseController
{
    /**
     * Lists all Group models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find(),
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
     * Displays a single Group model.
     * @param int $id ID
     * @return Response|string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): Response|string
    {
        $model = $this->findModel($id);
        $family = new FamilyList();
        $family->group_id = $model->id;
        $schedule = LessonSchedule::findOne(['group_id' => $model->id]);
        if ($family->load($this->request->post())) {
            if ($family->pupilIsSet() && $family->save()) {
                Yii::$app->session->setFlash('success', 'New Pupil added');
            } else {
                Yii::$app->session->setFlash('danger', 'This pupil has already added');
            }
            return $this->refresh();
        }
        $pupil_list = FamilyList::findAll(['group_id' => $model->id]);
        return $this->render('view', compact('family', 'pupil_list', 'model', 'schedule'));
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

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate(): Response|string
    {
        $model = new Group();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Group model.
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
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Group
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
