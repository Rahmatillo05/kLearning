<?php

use common\models\user\User;
use common\widgets\Tools;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

?>
<p>
    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'T/r'
            ],
            'full_name',
            'username',
            'tel_number',
            [
                'attribute' => 'status',
                'value' => function (User $model) {
                    return Tools::setStatusBadgeAsIcon($model->status);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'role',
                'value' => function (User $model) {
                    return Tools::ruleName($model->role);
                }
            ],
            'created_at:date',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => Tools::gridViewButtons()
            ],
        ],
        'pager' => [
            'class' => LinkPager::class
        ]
    ]); ?>
</div>