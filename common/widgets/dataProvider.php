<?php
namespace common\widgets;
use common\models\groups\WaitList;
use common\models\user\User;
use yii\data\ActiveDataProvider;

class dataProvider
{
    public static function Manager(): ActiveDataProvider
    {
       return new ActiveDataProvider([
            'query' => User::find()->where(['role' => Detect::MANAGER]),

            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
    }

    public static function wait_list(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => WaitList::find(),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ]
        ]);
    }
}