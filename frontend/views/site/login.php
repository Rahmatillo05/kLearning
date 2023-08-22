<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-6 my-3 offset-3">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username')->textInput(['style' =>'border-radius:20px;','placeholder'=>'username...']) ?>
                <?= $form->field($model, 'password')->passwordInput(['style' =>'border-radius:20px;','placeholder'=>'password...']) ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group text-right">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
