<?php

namespace frontend\controllers;

use common\models\course\Category;
use common\models\course\Course;
use common\models\groups\WaitList;
use common\widgets\Detect;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{

    /**
     * Lists all Course models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
            'pagination' => [
                'pageSize' => 12
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);

        $categories = Category::findAll(['status' => Detect::STATUS_ACTIVE]);
        $wait_list = new WaitList();
        $wait_list->teacher_id = $model->teacher_id;
        $wait_list->course_id = $model->id;
        return $this->render('view', [
            'model' => $model,
            'categories' => $categories,
            'wait_list' => $wait_list
        ]);
    }

    public function actionWaitList(): Response
    {
        $model = new WaitList();

        if ($model->load(Yii::$app->request->post())) {
            $user = WaitList::findOne([
                'course_id' => $model->course_id,
                'teacher_id' => $model->teacher_id,
                'full_name' => $model->full_name
            ]);
            if (!$user) {
                if ($model->validate() && $model->save()) {
                    Yii::$app->session->setFlash('success', "Murojatingiz uchun rahmat! Tez orada siz bilan bog'lanishadi!");
                    return $this->redirect(Yii::$app->request->referrer);
                } else {
                    Yii::$app->session->setFlash('error', "Saqlashda xatolik yuz berdi! Iltimos qaytadan urinib ko'ring!");
                    return $this->redirect(Yii::$app->request->referrer);
                }
            } else{
                Yii::$app->session->setFlash('error', "Siz allaqachon qabul ro'yhatida mavjudsiz!");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        return $this->goBack();
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
