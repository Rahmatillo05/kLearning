<?php

namespace frontend\modules\owner\controllers;

use backend\controllers\BaseController;
use common\models\user\User;
use common\widgets\Detect;
use yii\data\ActiveDataProvider;

class PupilController extends BaseController
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['role' => Detect::PUPIL]),

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
}