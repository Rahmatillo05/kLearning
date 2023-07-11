<?php

namespace frontend\modules\teacher\controllers;

use common\models\groups\Group;
use common\models\groups\LessonSchedule;
use frontend\controllers\ModuleController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class GroupController extends ModuleController
{

    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find()->where(['teacher_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 30
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('index', compact('dataProvider'));
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $group = $this->findModel($id);

        return $this->render('view', compact('group'));
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
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', compact('model'));
    }

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
     * @throws NotFoundHttpException
     */
    private function findModel(int $id): ?Group
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}