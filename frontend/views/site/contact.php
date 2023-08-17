<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;
use kartik\select2\Select2;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://1234567920">+998 90 583-28-54</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">dasturchi657@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'title') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                
                <?= $form->field($model, 'status')->hiddenInput(['value' => 0],)->label(false) ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

