<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\groups\WaitList $model */
/** @var ActiveForm $form */
?>
<h3>Qabulga yozilish!</h3>

<?php $form = ActiveForm::begin([
        'action'=>Url::toRoute(['notification'])
]); ?>

<?= $form->field($model, 'teacher_id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'course_id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'full_name')->textInput(['placeholder'=> 'To\'liq ismingiz']) ?>
<?= $form->field($model, 'location')->textInput(['placeholder'=> 'Yashash manzilingiz']) ?>
<?= $form->field($model, 'phone_number')->widget(MaskedInput::class, [
    'mask' => '+\9\98 99 999-99-99',
    'options' => [
        'placeholder' => '+998 90 123-45-67'
    ]
]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>

