<?php

use common\widgets\Tools;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\course\Course $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => "multipart/form-data",
            'class' => 'row'
        ]
    ]); ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::class, [
        'data' => $model->teacherList,
        'hideSearch' => true,
        'options' => [
            'placeholder' => 'Select teacher ...'
        ]
    ]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::class, [
        'data' => $model->categoryList,
        'hideSearch' => true,
        'options' => [
            'placeholder' => 'Select category ...'
        ]
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if ($model->image): ?>
        <div class="mb-3">
            <label class="form-label mr-3">Old image</label>
            <?= Tools::viewImage($model->image) ?>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="col-3">
        <?= $form->field($model, 'first_lesson')->widget(DateTimePicker::class, [
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
            'data' => Tools::statusList(),
            'hideSearch' => true
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
