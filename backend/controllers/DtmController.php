<?php

namespace backend\controllers;

use common\models\dtm\Subject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * DtmController implements the CRUD actions for Subject model.
 */
class DtmController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('dtm_index');
    }

    public function actionSubject(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Subject::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $new_subject = new Subject();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $new_subject
        ]);
    }

    public function actionSubjectView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findSubjectModel($id),
        ]);
    }


    public function actionSubjectCreate()
    {
        $model = new Subject();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['subject']);
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->redirect(['subject']);
    }


    public function actionSubjectUpdate(int $id): Response|string
    {
        $model = $this->findSubjectModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['subject']);
        }

        return $this->render('subject', [
            'model' => $model,
        ]);
    }


    public function actionSubjectDelete(int $id): Response
    {
        $this->findSubjectModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findSubjectModel(int $id): Subject
    {
        if (($model = Subject::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
