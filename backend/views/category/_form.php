<?php

use common\widgets\Tools;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\course\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-body pb-1">

    <?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['create']),
        'layout' => ActiveForm::LAYOUT_INLINE
    ]); ?>
    <div class="row ">
        <div class="col-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'status')->widget(Select2::class, [
                'data' => Tools::statusList(),
                'hideSearch' => true
            ]) ?>
        </div>
        <div class="col-5">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>

