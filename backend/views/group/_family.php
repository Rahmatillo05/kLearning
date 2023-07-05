<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\groups\FamilyList $model */
/** @var ActiveForm $form */
?>
<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'family_id')->widget(Select2::class, [
        'data' => $model->families,
        'options' => [
            'placeholder' => 'Select pupil...'
        ]
    ]) ?>
    <?= $form->field($model, 'group_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- group-_family -->
