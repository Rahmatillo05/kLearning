<?php

use common\models\dtm\Dtm;
use common\models\dtm\DtmPupil;
use common\widgets\Detect;
use common\widgets\Tools;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
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
                <a href="<?= Url::to(['/dtm/update', 'id' => $model->id]) ?>" class="btn btn-primary">Update</a>
                <a href="<?= Url::to(['/dtm/delete', 'id' => $model->id]) ?>" data-method="post" class="btn btn-danger"><i class="ti ti-trash"></i> Delete</a>
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
            </div>
            <?php if ($model->dtmPupils): ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dtm_result">
                        <thead>
                        <tr>
                            <th>T/R</th>
                            <th>F.I.SH</th>
                            <th>Bloklari</th>
                            <th>Fan 1</th>
                            <th>Fan 2</th>
                            <th>Majburiy fanlar</th>
                            <th>Umumiy ball</th>
                            <th>Ballni yangilash</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;
                        foreach ($model->dtmResults as $result): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $result->pupil->full_name ?></td>
                                <td><?= Tools::dtmBlock($result->pupil->subject_1, $result->pupil->subject_2) ?></td>
                                <td><?= $result->subject_1 ?? 0 ?></td>
                                <td><?= $result->subject_2 ?? 0 ?></td>
                                <td><?= $result->require_subject ?? 0 ?></td>
                                <td><?= $result->total ?? 0 ?></td>
                                <td>
                                    <a href="<?= Url::to([
                                        '/dtm/plus-score',
                                        'pupil_id' => $result->pupil_id
                                    ]) ?>" class="btn btn-sm btn-primary add-score">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
