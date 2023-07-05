<?php

use common\widgets\Tools;
use kartik\select2\Select2;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\groups\Group $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::class, [
        'data' => $model->teacherList
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(Select2::class, [
        'data' => Tools::statusList(),
        'hideSearch' => true
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
