<?php

namespace backend\controllers;

use common\models\dtm\Dtm;
use common\models\dtm\DtmPupil;
use common\models\dtm\DtmResult;
use common\models\dtm\Subject;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
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

    public function actionNew(): Response|string
    {
        $model = new Dtm();
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Starting new challenge");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', "Ma'lumotlarni saqlab bo'lmadi!");
                $model->loadDefaultValues();
            }
        }
        return $this->render('_dtm_form', compact('model'));
    }

    public function actionView(int $id): string
    {
        $model = $this->findDtmModel($id);
        $dtm_pupil = new DtmPupil();
        return $this->render('dtm_view', compact('model', 'dtm_pupil'));
    }

    public function actionAddPupil(): Response
    {
        $model = new DtmPupil();
        if ($model->load($this->request->post()) && $model->save() && $model->setDefaultResult()) {
            Yii::$app->session->setFlash('success', "Yangi o'quvchi qo'shildi!");
            return $this->redirect(['view', 'id' => $model->dtm_id]);
        }
        Yii::$app->session->setFlash('error', "Yangi o'quvchi qo'shilmadi!");
        return $this->redirect(['view', 'id' => $model->dtm_id]);
    }

    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findDtmModel($id);

        if ($model->load($this->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Update DTM information");
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Ma\'lumotlarni saqlab bo\'lmadi!');
                $model->loadDefaultValues();
            }
        }
        return $this->render('_dtm_form', compact('model'));
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionPlusScore($pupil_id): Response|array
    {
        $result = $this->findDtmResultModel($pupil_id);
        $response = [];
        if ($this->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response['title'] = $result->pupil->full_name;
            $response['form'] = $this->renderAjax('_add-score', [
                'model' => $result
            ]);
        }
        if ($result->load(Yii::$app->request->post())) {
            if ($result->validate() && $result->saveModel()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $response;
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

    protected function findDtmModel(int $id): Dtm
    {
        if (($model = Dtm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findDtmResultModel(int $id): DtmResult
    {
        if (($model = DtmResult::findOne(['pupil_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
