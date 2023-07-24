<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\user\TeacherSocialAccounts $model */
/**
 * @var ActiveForm $form
 * @var int $teacher_id
 */
?>
<div class="user-_teacher_social_accounts">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $teacher_id])->label(false) ?>
    <?= $form->field($model, 'telegram') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'instagram') ?>
    <?= $form->field($model, 'youtube') ?>
    <?= $form->field($model, 'facebook') ?>
    <?= $form->field($model, 'others') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-_teacher_social_accounts -->
