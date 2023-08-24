<?php

use common\widgets\StaticSource;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\dtm\Dtm $model */
/** @var ActiveForm $form */
$this->title = "New DTM test"
?>
<div class="card">
    <div class="card-header">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput() ?>

        <div class="row">
            <div class="col-3">
                <?= $form->field($model, 'start_date')->widget(DateTimePicker::class, [
                    'type' => DateTimePicker::TYPE_INPUT,
                    'value' => date('d.m.Y H:i'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy hh:ii'
                    ]
                ]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'status')->widget(Select2::class, [
                    'data' => StaticSource::dtmStatus(),
                    'hideSearch' => true
                ]) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div><!-- dtm-_dtm_form -->
