<?php

namespace frontend\modules\teacher\controllers;

use common\models\groups\Group;
use frontend\controllers\ModuleController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class GroupController extends ModuleController
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Group::find()->where(['teacher_id' => Yii::$app->user->id]),
            'pagination' => [
                'pageSize' => 30
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(int $id)
    {
        $group = $this->findModel($id);

        return $this->render('view', compact('group'));
    }

    /**
     * @throws NotFoundHttpException
     */
    private function findModel(int $id): ?Group
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}