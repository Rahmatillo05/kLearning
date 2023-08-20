<?php

namespace frontend\modules\teacher\controllers;

use common\models\course\Course;
use common\widgets\StaticSource;
use common\widgets\Tools;
use frontend\controllers\ModuleController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class CourseController extends ModuleController
{
    public function actionIndex(): string
    {
        $dataProvider = Tools::active();

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

    public function actionCreate(): Response|string
    {
        $model = new Course();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $image = UploadedFile::getInstance($model, 'image');
                if ($model->image = $model->uploadFile($image)) {
                    $model->save();
                    Yii::$app->session->setFlash('success', 'Course added');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('danger', 'Course no added');
                    $model->loadDefaultValues();
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', compact('model'));
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