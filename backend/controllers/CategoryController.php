<?php

namespace backend\controllers;

use common\models\course\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{

    /**
     * Lists all Category models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),

            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);
        $model = new Category();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }


    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate(): Response|string
    {
        $model = new Category();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Category added!');
                return $this->redirect(['index']);
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
    public function actionUpdateName($id)
    {
        $model = $this->findModel($id);
        if (isset($_POST['hasEditable'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (isset($_POST['name'])) {
                $oldValue = $model->getOldAttribute('name');
                $model->name = $_POST['name'];
                if ($model->save()){
                    return ['output' => $model->name, 'message' => ''];
                } else{
                    return ['output' => $oldValue, 'Incorrect data'];
                }
            } else {
                return ['output' => '', 'message' => ''];
            }
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdateStatus($id)
    {
        $model = $this->findModel($id);
        if (isset($_POST['hasEditable'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (isset($_POST['status'])) {
                $oldValue = $model->getOldAttribute('status');
                $model->status = $_POST['status'];
                if ($model->save()){
                    return ['output' => $model->status, 'message' => ''];
                } else{
                    return ['output' => $oldValue, 'Incorrect data'];
                }
            } else {
                return ['output' => '', 'message' => ''];
            }
        }
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Category
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
