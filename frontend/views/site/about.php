<?php

/** @var yii\web\View $this */

use common\widgets\Detect;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if (!$model) {
?>
 <section class="ftco-section ftco-about img">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-12 about-intro">
          <div class="row">
            <div class="col-md-6 d-flex">
              <div class="d-flex about-wrap">
                <div class="img d-flex align-items-center justify-content-center" style="background-image:url('<?= Url::base() ?>/front/images/bg_3.jpg');">
                </div>
                <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url('<?= Url::base() ?>/front/images/bg_3.jpg');">
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-md-5 py-5">
              <div class="row justify-content-start pb-3">
                <div class="col-md-12 heading-section ftco-animate">
                  <span class="subheading">Kelajakni biz bilan quring!</span>
                  <h2 class="mb-4">Kelajakka xush kelibsiz!</h2>
                  <p>Kelajakda kim bo'lishingiz bugungi harakatingizga bog'liq. Agar siz shifokor
                                    bo'lmoqchi bo'lsangiz albatta biologiya, kimyo fanlarini yaxshi bilishingiz kerak.
                                    IT mutaxassisi bo'lishni istasangiz, buni avvalo kompyuter savodxonligidan
                                    boshlashingiz kerak. Xo'sh, bu bilim va ko'nikmalarni qayerda o'rganish mumkin
                                    deysizmi?
                                    Albatta Kelajak Academyda!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
} else {
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
                  <p><?= $model['text'] ?></p>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
?>

<?php
if(!$teachers && !$pupils && !$courses){
  ?>
  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-online"></span></div>
          <div class="text">
            <strong class="number" data-number="0">0</strong>
            <span>O'qituvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-graduated"></span></div>
          <div class="text">
            <strong class="number" data-number="0">0</strong>
            <span>O'quvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-instructor"></span></div>
          <div class="text">
            <strong class="number" data-number="0">0</strong>
            <span>Guruxlar</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
}else{
  ?>
  <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-online"></span></div>
          <div class="text">
            <strong class="number" data-number="<?= $teachers ?>"><?= $teachers ?></strong>
            <span>O'qituvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-graduated"></span></div>
          <div class="text">
            <strong class="number" data-number="<?= $pupils ?>"><?= $pupils ?></strong>
            <span>O'quvchilar</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex align-items-center">
          <div class="icon"><span class="flaticon-instructor"></span></div>
          <div class="text">
            <strong class="number" data-number="<?= $courses ?>"><?= $courses ?></strong>
            <span>Guruxlar</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
}
?>

<?php
if(!$datas){
  ?>
<br>  <a href="/site/contact" class="btn btn-outline-primary">Fikr Jo'natish</a>
<?php
}else{
  ?>
  <section class="ftco-section testimony-section bg-light">
  <div class="overlay" style="background-image: url(images/bg_2.jpg);"></div>
  <div class="container">
    <div class="row pb-4">
      <div class="col-md-7 heading-section ftco-animate">
        <h2 class="mb-4">Fikrlar</h2>
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
  <?php
}
?>