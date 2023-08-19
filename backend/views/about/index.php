<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

?>
<div class="contact-index">
    <?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['/about/index'])
    ]); ?>
    <?= $form->field($model, 'motiv')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'title')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 5]) ?>

    <div class="form-group mb-3">
        <?= $model->first_image ? Html::img(Yii::getAlias('@images') . "/{$model->first_image}", ['class' => 'img-fluid w-50']) : '' ?>

    </div>
    <?= $form->field($model, 'first_image')->fileInput() ?>
    <div class="form-group mb-3">
        <?= $model->last_image ? Html::img(Yii::getAlias('@images') . "/{$model->last_image}", ['class' => 'img-fluid w-50']) : '' ?>
    </div>
    <?= $form->field($model, 'last_image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>