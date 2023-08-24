<?php

use common\widgets\Tools;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\course\Course $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">

    <h3 class="card-header card-title"><?= Html::encode($this->title) ?></h3>

    <div class="card-body">
         <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-bordered'
            ],
            'attributes' => [
                'id',
                [
                    'attribute' => 'teacher_id',
                    'value' => $model->teacher->full_name
                ],
                [
                    'attribute' => 'category_id',
                    'value' => $model->category->name
                ],
                [
                    'attribute' => 'image',
                    'value' => Tools::viewImage($model->image),
                    'format' => 'html'
                ],

                'title',
                'description:ntext',
                'first_lesson',
                [
                    'attribute' => 'status',
                    'value' => Tools::setStatusBadgeAsIcon($model->status),
                    'format' => 'html'
                ],
                'created_at:date',
                'updated_at:date',
            ],
        ]) ?>
    </div>
    <h2>Qabuldegi oquvchilar</h2>
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
            'ful_name',
            'location',
            'phone_number',
            [
                'attribute' => 'status',
                'value' => Tools::setStatusBadgeAsIcon($model->status),
                'format' => 'html'
            ],
            'created_at:data'
        ],
        'pager' => [
            'class' => LinkPager::class
        ]
    ]); ?>
</div>
