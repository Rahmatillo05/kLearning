<?php

use common\models\groups\WaitList;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\VarDumper;

/**
 * @var ActiveDataProvider $wait_list
 */

echo GridView::widget([
    'dataProvider' => $wait_list,
    'tableOptions' => [
        'class' => 'table table-bordered'
    ],
    'layout' => "{items}\n{pager}",
    'columns' => [
        ['class' => SerialColumn::class],
        [
            'attribute' => 'course_id',
            'value' => function(WaitList $waitList){
                $module = Yii::$app->getModules(true)[0]->id;
                return Html::a($waitList->course->title, ["/$module/course/view", 'id' => $waitList->id]);
            },
            'format' => 'html'
        ],
        'full_name',
        'location',
        'phone_number',
        'created_at:date'
    ],
    'pager' => [
        'class' => LinkPager::class
    ]
])

?>

