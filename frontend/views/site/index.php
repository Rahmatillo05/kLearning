<?php

/**
 * @var yii\web\View $this
 * @var About $about
 * @var ActiveDataProvider $courses
 * @var int $pupils
 * @var int $teacher
 * @var ActiveDataProvider $comments
 */

use common\models\about\About;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Kelajak Education';
?>
<!--About-->
<section class="ftco-section ftco-about img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex about-wrap">
                            <div class="img d-flex align-items-center justify-content-center"
                                 style="background-image:url(<?= $about ? Yii::getAlias('@uploadFile'). "/{$about->first_image}" : Yii::getAlias('@source').'/about-1.jpg' ?>);">
                            </div>
                            <div class="img-2 d-flex align-items-center justify-content-center"
                                 style="background-image:url(<?= $about ? Yii::getAlias('@uploadFile'). "/{$about->last_image}" : Url::base().'/front/images/about.jpg' ?>);">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">
                                <h2 class="mb-4"><?= $about->motiv ?? "Kelajakka xush kelibsiz!" ?></h2>
                                <p><?= $about->text ?? "Kelajakda kim bo'lishingiz bugungi harakatingizga bog'liq. Agar siz shifokor
                                    bo'lmoqchi bo'lsangiz albatta biologiya, kimyo fanlarini yaxshi bilishingiz kerak.
                                    IT mutaxassisi bo'lishni istasangiz, buni avvalo kompyuter savodxonligidan
                                    boshlashingiz kerak. Xo'sh, bu bilim va ko'nikmalarni qayerda o'rganish mumkin
                                    deysizmi?
                                    Albatta Kelajak Academyda!" ?></p>
                                <p><a href="<?= Url::to(['course/index']) ?>" class="btn btn-primary mt-2">O'z
                                        kursingizni tanlang</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About-->
<!--Courses-->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Bugundan o'qishni boshlang</span>
                <h2 class="mb-4">Kursingizni tanlang</h2>
            </div>
        </div>
        <?=
        ListView::widget([
            'dataProvider' => $courses,
            'itemView' => '_courseItem',
            'layout' => "{items}",
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-4 ftco-animate'
            ]
        ])
        ?>
    </div>
</section>
<!--End courses-->


<!--Our Status-->
<section class="ftco-section ftco-counter img" id="section-counter"
         style="background-image: url(<?= Url::base() . '/front/images/bg_4.jpg' ?>)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-online"></span></div>
                    <div class="text">
                        <strong class="number" data-number="<?= $courses->count ?>">0</strong>
                        <span>Dan Ortiq kurslar</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-graduated"></span></div>
                    <div class="text">
                        <strong class="number" data-number="<?= $pupils ?>">0</strong>
                        <span>dan ortiq o'quvchilar</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 d-flex align-items-center">
                    <div class="icon"><span class="flaticon-instructor"></span></div>
                    <div class="text">
                        <strong class="number" data-number="<?= $teacher ?>">0</strong>
                        <span>malakali o'qituvchilar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End status-->

<!--Comments-->
<section class="ftco-section testimony-section bg-light">
    <div class="overlay" style="background-image: url(<?= Url::base()."/front/images/bg_2.jpg" ?>)"></div>
    <div class="container">
        <div class="row pb-4">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Fikrlar</span>
                <h2 class="mb-4">Biz haqimizdagi fikrlar</h2>
            </div>
        </div>
    </div>
    <div class="container container-2">
        <div class="row ftco-animate">
            <div class="col-md-12">
                <?= ListView::widget([
                    'dataProvider' => $comments,
                    'itemView' => '_contact',
                    'emptyText' => '',
                    'layout' => "{items}",
                    'options' => [
                        'class' => 'carousel-testimony owl-carousel'
                    ],
                    'itemOptions' => [
                        'class' => 'item'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</section>
<!--End comments-->
<br><br>
