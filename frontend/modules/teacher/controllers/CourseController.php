<?php

namespace frontend\modules\teacher\controllers;

use common\models\course\Course;
use common\widgets\StaticSource;
use frontend\controllers\ModuleController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class CourseController extends ModuleController
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find()->where(['teacher_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 30
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
        $model = $this->findModelBySlug($id);
        return $this->render('view', compact('model'));
    }

    /**
     * @throws NotFoundHttpException
     */
    private function findModelBySlug(int $id): ?Course
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}