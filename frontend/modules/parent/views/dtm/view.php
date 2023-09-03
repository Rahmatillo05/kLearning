<?php

use common\models\dtm\Dtm;
use common\models\dtm\DtmResult;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var View $this
 * @var Dtm $model
 */
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftco-section">
    <div class="container">
        <?php if ($model->status === Detect::STATUS_DELETED): ?>
            <div class="row">
                <div class="col">
                    <a target="_blank" href="<?= Url::to(['/dtm/result-download', 'id' => $model->id]) ?>" class="btn btn-primary mb-2">Natijalarni
                        yuklab olish <i class="ti ti-download"></i> </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">

                    <?= GridView::widget([
                        'dataProvider' => $model->dtmResults,
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
                            ]
                        ],
                        'layout' => "{items} \n {pager}",
                        'pager' => [
                            'class' => LinkPager::class
                        ]
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
