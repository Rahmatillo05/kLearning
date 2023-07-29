<?php

use common\models\user\User;
use common\widgets\Tools;
use yii\web\View;
use yii\helpers\VarDumper;

/**
 * @var View $this
 * @var User $model
 */
$this->title = $model->full_name;

$this->params['breadcrumbs'][] = ['label' => 'O\'qituvchilar', 'url' => ['index']];

?>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate d-flex align-items-center align-items-stretch">
                <div class="staff-2 w-100">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch d-flex align-items-end" style="background-image: url(<?= $model->userInfo->image ? Yii::getAlias('@images') . '/' . $model->userInfo->image : '' ?>);">
                            <div class="text mb-4 text-md-center">
                                <h3><?= $model->full_name ?></h3>
                                <span class="position mb-2"><?= $model->userInfo->job ?? '' ?></span>
                                <div class="faded">
                                    <?= Tools::renderTeacherSocials($model->socialAccount) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="staff-detail w-100 pl-md-5">
                    <h3>O'qituvchi haqida</h3>
                    <p><?= $model->userInfo->about ?? '' ?></p>
                    <h3>Ma'lumoti</h3>
                    <p><?= $model->userInfo->education ?? '' ?></p>
                    <h3>Ish tajribasi</h3>
                    <p><?= $model->userInfo->experience ?? '' ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt">
    <div class="container">
        <div class="row pb-4">
            <div class="col-md-12 heading-section ftco-animate">
                <h2 class="mb-4"><?= $model->full_name  ?> ga tegishli boshqa kurslar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-1.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-2.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-4.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-5.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="project-wrap">
                    <a href="#" class="img" style="background-image: url(images/work-6.jpg);">
                        <span class="price">Software</span>
                    </a>
                    <div class="text p-4">
                        <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                        <p class="advisor">Advisor <span>Tony Garret</span></p>
                        <ul class="d-flex justify-content-between">
                            <li><span class="flaticon-shower"></span>2300</li>
                            <li class="price">$199</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>