<?php

use common\models\dtm\Dtm;
use common\models\dtm\DtmPupil;
use common\models\dtm\DtmResult;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var View $this
 * @var Dtm $model
 * @var DtmPupil $dtm_pupil
 */

$this->title = $model->title;
?>

    <div class="card">
        <div class="card-header d-sm-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <?= Html::encode($this->title) ?>
                <?= Detect::dtmStatus($model->status) ?>
            </h3>
            <div>
                <a href="<?= Url::to(['/owner/dtm/update', 'id' => $model->id]) ?>" class="btn btn-primary">Update</a>
                <a href="<?= Url::to(['/owner/dtm/delete', 'id' => $model->id]) ?>" data-method="post" class="btn btn-danger"><i
                            class="ti ti-trash"></i> Delete</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card shadow-none rounded-0">
                <h4 class="card-title card-header">Add pupil</h4>
                <div class="card-body">
                    <?= $this->render('_add_pupil', [
                        'model' => $dtm_pupil
                    ]) ?>
                </div>
                <h4 class="card-title card-header">Pupil list</h4>
                <a href="<?= Url::to(['/owner/dtm/pdf-download', 'id' => $model->id]) ?>" target="_blank"
                   class="btn btn-info">Download PDF</a>
            </div>
            <?php if ($model->dtmPupils): ?>
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
                            ],
                            [
                                'class' => ActionColumn::class,
                                'template' => "{plus-score}",
                                'buttons' => [
                                    'plus-score' => function ($url, $model) {
                                        return Html::a('<i class="ti ti-plus"></i>',
                                            ['/owner/dtm/plus-score', 'pupil_id' => $model->pupil_id],
                                            [
                                                'class' => 'btn btn-sm btn-primary add-score'
                                            ]
                                        );
                                    }
                                ]
                            ]
                        ],
                        'layout' => "{items} \n {pager}",
                        'pager' => [
                            'class' => LinkPager::class
                        ]
                    ]) ?>

                </div>
            <?php else: ?>
                <h4 class="text-danger">No pupils</h4>
            <?php endif; ?>
        </div>
    </div>
<?php

Modal::begin([
    'title' => '',
    'id' => 'add-score'
]);

echo "<div class='modal-body'></div>";

Modal::end();

$js = <<<JS
   $(document).ready(function (){
       $('.add-score').click(function (e){
      e.preventDefault();
      let modal = $('#add-score');
      modal.modal('show');
      let url = $(this).attr('href');
      send(url, $('.modal-body'));
   });
       function send(url, modal) {
      $.ajax({
            url:url,
            method:'POST',
            success:function(response) {
                $('.modal-title').text(response.title)
                modal.html(response.form)
              console.log(response)
            },
            error:function(error) {
                modal.html("<h3 class='text-danger'>Xatolik yuz berdi. Qaytadan urinib ko'ring</h3>")
              console.log(error)
            },
            async:true
      })
    }
   });

JS;

$this->registerJs($js);
