<?php

namespace frontend\modules\owner\controllers;

use frontend\controllers\ModuleController;
use yii\web\ErrorAction;

class AppController extends ModuleController
{
    public function actions()
    {
        return [
          'error' => [
              'class' => ErrorAction::class
          ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}