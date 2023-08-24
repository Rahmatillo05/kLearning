<?php

use common\models\sms\Sms;
use kartik\form\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var \common\models\sms\Sms $model
 */
$this->title = "Xabar matni";
?>

<div class="card">
    <div class="card-header card-title">
        Xabar matnini tayyorlash
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
        <div class="form-group">
            <?= Html::submitButton('Jo\'natish', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>

