<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\dtm\DtmResult $model */
/** @var ActiveForm $form */
?>
<div class="dtm-_add-score">
    <b>Kiritishda faqat to'g'ri javoblar sonini kiriting</b>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dtm_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'pupil_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'subject_1')->textInput(['class' => 'input']) ?>
    <?= $form->field($model, 'subject_2')->textInput(['class' => 'input']) ?>
    <?= $form->field($model, 'require_subject')->textInput(['class' => 'input']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
