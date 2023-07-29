<?php

namespace frontend\controllers;

use common\models\user\User;
use common\widgets\Detect;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class TeachersController extends \yii\web\Controller
{
    public function actionIndex(): string
    {
        $teachers = new ActiveDataProvider([
            'query' => User::find()
                ->where(['role' => Detect::TEACHER, 'status' => Detect::STATUS_ACTIVE]),
            'pagination' => [
                'pageSize' => 90
            ]
        ]);
        return $this->render('index', compact('teachers'));
    }


    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);

        return $this->render('view', compact('model'));
    }

    /**
     * @throws NotFoundHttpException
     */
    private function findModel(int $id): User
    {
        $model = User::findOne(['status' => Detect::STATUS_ACTIVE, 'role' => Detect::TEACHER]);
        if (!$model){
            throw new NotFoundHttpException();
        }
        return $model;
    }

}
