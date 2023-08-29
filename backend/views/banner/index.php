<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = "Banners"
?>
<div class="contact-index">
    <?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['/banner/index'])
    ]); ?>

    <?= $form->field($model, 'title')->textInput() ?>
    
    <?= $form->field($model, 'motiv')->textInput() ?>

    <div class="form-group mb-3">
        <?= $model->main_img ? Html::img(Yii::getAlias('@images') . "/{$model->main_img}", ['class' => 'img-fluid w-50']) : '' ?>
    </div>
    <?= $form->field($model, 'main_img')->fileInput() ?>

    <div class="form-group mb-3">
        <?= $model->banners ? Html::img(Yii::getAlias('@images') . "/{$model->banners}", ['class' => 'img-fluid w-50']) : '' ?>
    </div>
    <?= $form->field($model, 'banners')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>