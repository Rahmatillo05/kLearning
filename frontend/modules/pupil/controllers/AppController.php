<?php

namespace frontend\modules\pupil\controllers;

use yii\web\Controller;
use yii\web\ErrorAction;

class AppController extends Controller
{
    public function actions(): array
    {
        return [
          'error' => [
              'class' => ErrorAction::class
          ]
        ];
    }
    public function actionIndex(): string
    {
        return $this->render('index');
    }

}