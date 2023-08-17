<?php

use common\models\contact\Contact;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'email:email',
            'title',
            // 'body',
            [
                'attribute' => 'status',
                'value' => function (Contact $model) {
                    return Tools::setStatusBadge($model->status);
                },
                'format' => 'html'
            ],
            //'rating',
            [
                'header' => "Action",
                'class' => ActionColumn::class,
                'urlCreator' => function ($action,Contact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => Tools::gridViewButtons()
            ],
        ],
    ]); ?>


</div>
