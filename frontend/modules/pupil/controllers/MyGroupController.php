<?php

namespace frontend\modules\pupil\controllers;

use backend\controllers\BaseController;
use common\models\groups\Family;
use common\models\groups\Group;
use Yii;

class MyGroupController extends BaseController
{
    public function actionIndex(): string
    {
        $family = Family::find()->where(['pupil_id' => Yii::$app->user->id])->one();
        return $this->render('index', compact('family'));
    }

    public function actionView(int $id): string
    {
        $group = Group::findOne($id);

        return $this->render('view', compact('group'));
    }
}