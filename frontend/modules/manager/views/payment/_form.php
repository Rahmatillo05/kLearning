<?php

use common\widgets\Detect;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\payment\Payment $model */
/** @var kartik\form\ActiveForm $form */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::class, [
        'data' => ArrayHelper::map($model->teachers, 'id', 'full_name'),
        'options' => [
            'placeholder' => 'O\'qituvchini tanlang...',
            'id' => 'teacher-id'
        ]
    ]) ?>

    <?= $form->field($model, 'group_id')->widget(DepDrop::class, [
        'options' => [
            'id' => 'group-id',
            'placeholder' => 'Guruhni tanlang...'
        ],
        'pluginOptions' => [
            'depends' => ['teacher-id'],
            'url' => Url::to(['/manager/payment/group']),
            'placeholder' => 'Guruhni tanlang...',
        ],
        'type' => DepDrop::TYPE_SELECT2
    ]) ?>

    <?= $form->field($model, 'pupil_id')->widget(DepDrop::class, [
        'options' => [
            'placeholder' => 'O\'quvchini tanlang...'
        ],
        'pluginOptions' => [
            'depends' => ['group-id'],
            'url' => Url::to(['/manager/payment/pupil']),
            'placeholder' => 'O\'quvchini tanlang...'
        ],
        'type' => DepDrop::TYPE_SELECT2
    ]) ?>

    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'amount')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' => 'currency',
                    'digits' => 0,
                    'removeMaskOnSubmit' => true,
                    'prefix' => '',
                ],
            ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'payment_type')->widget(Select2::class, [
        'data' => [
            Detect::PAYMENT_CASH => "Naqd pul",
            Detect::PAYMENT_PLASTIC => "Online to'lov"
        ],
        'hideSearch' => true
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
