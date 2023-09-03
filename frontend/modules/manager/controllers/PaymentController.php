<?php

namespace frontend\modules\manager\controllers;

use backend\controllers\BaseController;
use common\models\groups\FamilyList;
use common\models\groups\Group;
use common\models\payment\Payment;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends BaseController
{
    /**
     * Lists all Payment models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Payment::find(),
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
     * Displays a single Payment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     * @throws \ErrorException
     */
    public function actionCreate(): Response|string
    {
        $model = new Payment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save() && $sms = $model->paymentMessage()) {
                Yii::$app->session->setFlash('success', "SMS xabari jo'natildi!");
                return $this->redirect(['view', 'id' => $model->id]);
            } else{
                Yii::$app->session->setFlash('error', "SMS xabari jo'natilmadi!");
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
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
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
     * Deletes an existing Payment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGroup()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty(Yii::$app->request->post('depdrop_parents'))) {
            $params = Yii::$app->request->post('depdrop_all_params');
            $groups = self::groupList($params['teacher-id']);
            return ['output' => $groups, 'selected' => ''];
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionPupil(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty(Yii::$app->request->post('depdrop_parents'))) {
            $params = Yii::$app->request->post('depdrop_all_params');
            if (isset($params['group-id'])) {
                $pupils = self::pupilList($params['group-id']);
                return ['output' => $pupils, 'selected' => ''];
            }

        }
        return ['output' => '', 'selected' => ''];
    }

    private static function groupList(int $teacher_id): array
    {
        $groups = Group::findAll(compact('teacher_id'));
        $data = [];
        foreach ($groups as $group) {
            $data[] = [
                'id' => $group->id,
                'name' => $group->name
            ];
        }
        return $data;
    }

    private static function pupilList(int $group_id): array
    {
        $family_list = FamilyList::findAll(['group_id' => $group_id]);
        $data = [];
        foreach ($family_list as $familyList) {
            $data[] = [
                'id' => $familyList->family->pupil_id,
                'name' => $familyList->family->pupil->full_name
            ];
        }
        return $data;
    }
}
