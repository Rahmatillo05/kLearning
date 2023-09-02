<?php

use common\models\payment\Payment;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h1 class="card-title card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <p>
            <?= Html::a('New payment', ['create'], ['class' => 'btn btn-success']) ?>
        </p>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-bordered'
            ],
            'layout' => "{items}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                [
                    'attribute' => 'teacher_id',
                    'value' => 'teacher.full_name'
                ],
                [
                    'attribute' => 'group_id',
                    'value' => 'group.name'
                ],
                [
                    'attribute' => 'pupil_id',
                    'value' => 'pupil.full_name'
                ],
                [
                    'attribute' => 'amount',
                    'value' => 'numberFormat'
                ],
                [
                    'attribute' => 'payment_type',
                    'format' => 'html',
                    'value' => function (Payment $payment) {
                        return Detect::paymentStatus($payment->payment_type);
                    }
                ],
                'created_at:date',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Payment $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'buttons' => Tools::gridViewButtons(),
                    'template' => "{update}\n{delete}"
                ],
            ],
            'pager' => [
                'class' => LinkPager::class
            ]
        ]); ?>

    </div>

</div>
