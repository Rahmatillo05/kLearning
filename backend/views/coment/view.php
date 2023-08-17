<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\widgets\Tools;

/** @var yii\web\View $this */
/** @var common\models\contact\Contact $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-bordered'
        ],
        'attributes' => [
            'id',
            'username',
            'email:email',
            'title',
            'body',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Tools::setStatusBadge($model->status);
                },
                'format' => 'html'
            ],

        ],
    ]) ?>

</div>
