<?php

use common\models\dtm\Subject;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\dtm\DtmPupil $model */
/** @var ActiveForm $form */
?>

<?php $form = ActiveForm::begin([
        'action' => Url::toRoute(['/owner/dtm/add-pupil'])
]); ?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'full_name') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'subject_1')->widget(Select2::class, [
            'data' => ArrayHelper::map(Subject::find()->all(), 'name', 'name'),
            'options' => [
                'placeholder' => 'Fanlardan birini tanlang...'
            ]
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'subject_2')->widget(Select2::class, [
            'data' => ArrayHelper::map(Subject::find()->all(), 'name', 'name'),
            'options' => [
                'placeholder' => 'Fanlardan birini tanlang...'
            ]
        ]) ?>
    </div>

    <?= $form->field($model, 'dtm_id')->hiddenInput(['value' => Yii::$app->request->get('id')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
</div><!-- dtm-_add_pupil -->

<?php ActiveForm::end(); ?>

