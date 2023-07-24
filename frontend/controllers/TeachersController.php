<?php

namespace frontend\controllers;

use common\models\user\User;
use common\widgets\Detect;
use yii\data\ActiveDataProvider;

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

}
