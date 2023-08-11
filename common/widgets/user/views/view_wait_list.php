<?php

use common\models\groups\WaitList;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var ActiveDataProvider $wait_list
 */
$module = Yii::$app->getModules(true)[0]->id;
$form = ActiveForm::begin([
    'action' => Url::toRoute(["/$module/app/send-sms"]),
    'method' => 'GET'
]);
echo GridView::widget([
    'dataProvider' => $wait_list,
    'tableOptions' => [
        'class' => 'table table-bordered'
    ],
    'layout' => "{items}\n{pager}",
    'columns' => [
        [
            'class' => CheckboxColumn::class
        ],
        ['class' => SerialColumn::class],
        [
            'attribute' => 'course_id',
            'value' => function (WaitList $waitList) {
                $module = Yii::$app->getModules(true)[0]->id;
                return Html::a($waitList->course->title, ["/$module/course/view", 'id' => $waitList->id]);
            },
            'format' => 'html'
        ],
        'full_name',
        'location',
        'phone_number',
        'created_at:datetime',
        [
            'class' => ActionColumn::class,
            'template' => "{called}",
            'buttons' => [
                'called' => function ($url) {
                    return Html::a('<i class="ti ti-phone-call"></i>', $url, [
                        'class' => 'btn btn-sm btn-primary',
                        'data-bs-toggle' => "tooltip",
                        'data-bs-placement' => "bottom",
                        'data-bs-title' => "Telefon orqali ogohlantirish"
                    ]);
                }
            ]
        ]
    ],
    'pager' => [
        'class' => LinkPager::class
    ]
]);
echo "<div class='form-group'>";
echo Html::submitButton('Xabar jo\'natish', ['class' => 'btn btn-success']);
echo "</div>";
ActiveForm::end();
?>

