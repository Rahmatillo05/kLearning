<?php

use common\models\dtm\Dtm;
use common\models\dtm\DtmResult;
use common\widgets\Tools;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\web\View;

/**
 * @var Dtm $model
 * @var View $this
 */
$this->title = $model->title;
?>
<div class="table-responsive w-100">

    <?= GridView::widget([
        'dataProvider' => $model->results,
        'tableOptions' => [
            'class' => 'table table-bordered'
        ],
        'columns' => [
            [
                'class' => SerialColumn::class,
                'header' => 'T/R'
            ],
            [
                'attribute' => 'fish',
                'value' => 'pupil.full_name',
                'label' => 'F.I.SH'
            ],
            [
                'attribute' => 'Bloklari',
                'value' => function (DtmResult $model) {
                    return Tools::dtmBlock($model->pupil->subject_1, $model->pupil->subject_2);
                },
            ],
            [
                'attribute' => 'Fan 1',
                'value' => 'subject_1'
            ],
            [
                'attribute' => 'Fan 2',
                'value' => 'subject_2'
            ],
            [
                'attribute' => 'Majburiy Fanlar',
                'value' => 'require_subject'
            ],
            [
                'attribute' => 'Umumiy Ball',
                'value' => function (DtmResult $model) {
                    return "<b>{$model->total}</b>";
                },
                'format' => 'html'
            ],

        ],
        'layout' => "{items}",
    ]) ?>

</div>

