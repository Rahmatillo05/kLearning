<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\user\UserInfo $model */
/** @var ActiveForm $form */
?>
<div class="user-_teacher_info">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>
        <?= $form->field($model, 'job') ?>
        <?= $form->field($model, 'about')->textarea(['rows' => 5]) ?>
        <?= $form->field($model, 'education')->textarea(['rows' => 5]) ?>
        <?= $form->field($model, 'experience')->textarea(['rows' => 5]) ?>
        <?= $form->field($model, 'image')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-_teacher_info -->
