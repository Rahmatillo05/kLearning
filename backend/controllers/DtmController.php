<?php

namespace backend\controllers;

use common\models\dtm\Dtm;
use common\models\dtm\Subject;
use Yii;
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
        $dtm = new ActiveDataProvider([
            'query' => Dtm::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('dtm_index', compact('dtm'));
    }

    public function actionNew()
    {
        $model = new Dtm();
        if ($this->request->isPost && $model->load($this->request->post())){
            if ($model->save()){
                Yii::$app->session->setFlash('success', "Starting new challenge");
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->setFlash('error', "Ma'lumotlarni saqlab bo'lmadi!");
                $model->loadDefaultValues();
            }
        }
        return $this->render('_dtm_form', compact('model'));
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


    public function actionSubjectCreate(): Response
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
