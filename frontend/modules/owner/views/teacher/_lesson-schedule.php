<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\groups\LessonSchedule $model */
/** @var ActiveForm $form */
$this->title = "Lesson schedule";
$options = [
    'clientOptions' => [
        'alias' => 'hh:mm',
        'separator' => ":",
    ],
    'mask' => 'h:s',
    'options' => [
        'placeholder' => '___:___'
    ]
];
$week_day = array_slice($model->attributes, 3, 8);
?>
<div class="row">
    <div class="col-md-6 offset-md-2">
        <div class="card">
            <div class="card-title card-header">
                <?= $this->title ?>
            </div>
            <div class="card-body">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'group_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'room_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map($model->roomList, 'id', 'name'),
                    'options' => [
                        'placeholder' => 'Select room...'
                    ]
                ]) ?>
                <?php foreach ($week_day as $k => $v): ?>
                    <?= $form->field($model, $k)->widget(MaskedInput::class, $options) ?>
                <?php endforeach; ?>


                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div><!-- group-_lesson-schedule -->
