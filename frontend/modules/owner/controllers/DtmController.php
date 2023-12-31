<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\dtm\Dtm;
use common\models\dtm\DtmPupil;
use common\models\dtm\DtmResult;
use common\models\dtm\Subject;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * DtmController implements the CRUD actions for Subject model.
 */
class DtmController extends BaseController
{

    public function actionIndex(): string
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

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id): Response
    {
        $this->findDtmModel($id)->delete();
        Yii::$app->session->setFlash('success', "DTM was deleted");
        return $this->redirect(['index']);
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
    public function actionNew(): Response|string
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

    public function actionPdfDownload(int $id): string
    {
        $model = $this->findDtmModel($id);
        Yii::$app->response->format = Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('_dtm_result', compact('model')),
            'methods' => [
                'SetTitle' => $model->title,
                'SetAuthor' => Yii::$app->name,
                'SetCreator' => Yii::$app->name,
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }
    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findDtmModel($id);
        $dtm_pupil = new DtmPupil();
        return $this->render('dtm_view', compact('model', 'dtm_pupil'));
    }

    public function actionAddPupil(): Response
    {
        $model = new DtmPupil();
        if ($model->load($this->request->post()) && $model->save() && $model->setDefaultResult()){
            Yii::$app->session->setFlash('success', "Yangi o'quvchi qo'shildi!");
            return $this->redirect(['view', 'id' => $model->dtm_id]);
        }
        Yii::$app->session->setFlash('error', "Yangi o'quvchi qo'shilmadi!");
        return $this->redirect(['view', 'id' => $model->dtm_id]);
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

    /**
     * @throws NotFoundHttpException
     */
    public function actionSubjectView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findSubjectModel($id),
        ]);
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


    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
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

    /**
     * @throws NotFoundHttpException
     */
    protected function findDtmModel(int $id): Dtm
    {
        if (($model = Dtm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findDtmResultModel(int $id): DtmResult
    {
        if (($model = DtmResult::findOne(['pupil_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
