<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\dtm\Subject $model */
/** @var yii\widgets\ActiveForm $form */
$id = Yii::$app->request->get('id');
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin([
            'action' => $id ? Url::toRoute(['subject-update', 'id' => $id]) : Url::toRoute(['subject-create'])
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
