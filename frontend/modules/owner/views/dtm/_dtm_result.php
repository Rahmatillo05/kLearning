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
if ($model->dtmPupils): ?>
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
                    'attribute' => 'pupil_id',
                    'value' => 'pupil.full_name',
                    'label' => 'F.I.SH'
                ],
                [
                    'attribute' => 'Bloklari',
                    'value' => function (DtmResult $model) {
                        return Tools::dtmBlock($model->pupil->subject_1, $model->pupil->subject_2);
                    },
                ],
                'subject_1',
                'subject_2',
                'require_subject',
                [
                    'attribute' => 'total',
                    'value' => function (DtmResult $model) {
                        return "<b>{$model->total}</b>";
                    },
                    'format' => 'html'
                ],

            ],
            'layout' => "{items}",
        ]) ?>

    </div>
<?php else: ?>
    <h4 class="text-danger">No pupils</h4>
<?php endif; ?>
