<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
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
                <p>text</p>
                <p><a href="#" class="btn btn-primary"><?= $model['text'] ?></a></p>
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
      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-online"></span></div>
          <div class="text">
            <strong class="number" data-number="400">0</strong>
            <span>Online Courses</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-graduated"></span></div>
          <div class="text">
            <strong class="number" data-number="4500">0</strong>
            <span>Students Enrolled</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-instructor"></span></div>
          <div class="text">
            <strong class="number" data-number="1200">0</strong>
            <span>Experts Instructors</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-tools"></span></div>
          <div class="text">
            <strong class="number" data-number="300">0</strong>
            <span>Hours Content</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section testimony-section bg-light">
  <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
  <div class="container">
    <div class="row pb-4">
      <div class="col-md-7 heading-section ftco-animate">
        <h2 class="mb-4">Talabalar nima deydi</h2>
      </div>
    </div>
  </div>
  <div class="container container-2">
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <?php
          foreach ($datas as $item) {
            ?>
            <div class="item">
            <div class="testimony-wrap py-4">
              <div class="text"> 
                <p class="mb-4"><?= $item['body'] ?></p>
                <div class="d-flex align-items-center">
                  <div class="pl-3">
                    <p class="name"><?= $item['username'] ?></p>
                    <span class="position"><?= $item['title'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>