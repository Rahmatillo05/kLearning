<?php

/** @var yii\web\View $this */

use yii\helpers\StringHelper;

$this->title = 'Kelajak Education';
?>

<section class="ftco-section ftco-about img">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-12 about-intro">
        <div class="row">
          <div class="col-md-6 d-flex">
            <div class="d-flex about-wrap">
              <div class="img d-flex align-items-center justify-content-center" style="background-image:url(<?= Yii::getAlias('@images') . "/{$model->first_image}" ?>);">
              </div>
              <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url(<?= Yii::getAlias('@images') . "/{$model->last_image}" ?>);">
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-md-5 py-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading"><?= $model['motiv'] ?></span>
                <h2 class="mb-4"><?= $model['title'] ?></h2>
                <p><?= StringHelper::truncate($model['text'], 320, ' ...') ?></p>
                <a href="/site/about" class="btn btn-outline-primary">Batafsil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-online"></span></div>
          <div class="text">
            <strong class="number" data-number="6466">0</strong>
            <span>O'qituvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-graduated"></span></div>
          <div class="text">
            <strong class="number" data-number="10000">0</strong>
            <span>O'quvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-instructor"></span></div>
          <div class="text">
         
                <strong class="number" data-number="<?= $courses ?>"><?=$courses?></strong>
          
            <span>Fanlar</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>