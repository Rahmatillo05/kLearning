<?php

use common\models\groups\WaitList;
use common\widgets\Detect;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var \common\models\user\User $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>


<?php $form = ActiveForm::begin(); ?>
<?= Select2::widget([
    'data' => ArrayHelper::map(WaitList::findAll(['status' => Detect::REPLY]), 'id', 'full_name'),
    'name' => 'search',
    'options' => ['placeholder' => 'Select an item...', 'id' => 'wait-list'],
]) ?>
<?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'id' => 'full-name-input']) ?>

<?= $form->field($model, 'tel_number')->widget(MaskedInput::class, [
    'mask' => '+\9\98 99 999-99-99',
    'options' => [
        'placeholder' => '+998 90 123-45-67',
        'id' => 'phone-number-input'
    ]
]) ?>

<?= $form->field($model, 'status')->widget(Select2::class, [
    'data' => $model->userStatusList(),
    'hideSearch' => true
]) ?>

<?= $form->field($model, 'role')->hiddenInput(['value' => \common\widgets\Detect::PUPIL])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php

$js = <<<JS
$("#wait-list").on('change', function() {
    let id = $(this).val();
  $.ajax({
    type:"GET",
    url:`/backend/user/search?id=`+id,
    dataType:'json',
    success:function(data) {
      $('#full-name-input').val(data.full_name); 
      $('#phone-number-input').val(data.phone_number);
    }
  })
})
JS;

$this->registerJs($js);
