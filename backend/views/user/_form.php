<?php

use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var \common\models\user\User $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tel_number')->widget(MaskedInput::class, [
    'mask' => '+\9\98 99 999-99-99',
    'options' => [
        'placeholder' => '+998 90 123-45-67'
    ]
]) ?>

<?= $form->field($model, 'status')->widget(Select2::class, [
    'data' => $model->userStatusList(),
    'hideSearch' => true
]) ?>

<?= $form->field($model, 'role')->widget(Select2::class, [
    'data' => $model->userRoleList(),
    'hideSearch' => true
]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

