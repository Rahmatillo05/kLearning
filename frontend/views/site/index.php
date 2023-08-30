<?php

/** @var yii\web\View $this */

use common\widgets\Detect;
use common\widgets\Tools;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'Kelajak Education';
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
                                <div class="img d-flex align-items-center justify-content-center"
                                     style="background-image:url('<?= Url::base() ?>/front/images/bg_3.jpg');">
                                </div>
                                <div class="img-2 d-flex align-items-center justify-content-center"
                                     style="background-image:url('<?= Url::base() ?>/front/images/bg_3.jpg');">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">Kelajakni biz bilan quring!</span>
                                    <h2 class="mb-4">Kelajakka xush kelibsiz!</h2>
                                    <p>Kelajakda kim bo'lishingiz bugungi harakatingizga bog'liq. Agar siz shifokor
                                        bo'lmoqchi bo'lsangiz albatta biologiya, kimyo fanlarini yaxshi bilishingiz
                                        kerak.
                                        IT mutaxassisi bo'lishni istasan...</p>
                                    <a href="/site/about" class="btn btn-outline-primary">Batafsil</a>
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
                                <div class="img d-flex align-items-center justify-content-center"
                                     style="background-image:url(<?= Yii::getAlias('@images') . "/{$model->first_image}" ?>);">
                                </div>
                                <div class="img-2 d-flex align-items-center justify-content-center"
                                     style="background-image:url(<?= Yii::getAlias('@images') . "/{$model->last_image}" ?>);">
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
    <?php
}
?>

<?php
if (!$teachers && !$pupils && !$courses) {
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
} else {
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
if (!$datas) {
    ?><br>
    <a href="/site/contact" class="btn btn-outline-primary">Fikr Jo'natish</a>
    <?php
} else {
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
        <div class="container">
            <div class="row ftco-animate">
                <?php
                foreach ($datas as $item) {
                    ?>
                    <div class="col-md-3">
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
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        </div>
    </section>
    <?php
}
?>


<?php
if (!$indexTeacher) {
    ?>
    <h2>Malumotlar topilmadi</h2>
    <?php
} else {
    ?>
    <section class="ftco-section bg-light">
        <div class="container">
            <h2>O'qituvchilar</h2>
            <br>
            <?php
            if (!$indexTeacher) {
                echo "Malumotlar topilmadi";
            } else {
            ?>
            <div class="row">
                <?php
                foreach ($indexTeacher as $item) {
                    ?>
                    <div class="staff col-md-4">
                        <div class="img-wrap d-flex align-items-stretch">
                            <div class="img align-self-stretch"
                                 style="background-image: url(<?= Yii::getAlias('@images') ?>/<?= $item->userInfo->image ?? '' ?>);"></div>
                        </div>
                        <div class="text pt-3">
                            <h3>
                                <a href="<?= Url::to(['/teachers/view', 'id' => $item->id]) ?>"><?= $item->full_name ?? '' ?></a>
                            </h3>
                            <span class="position mb-2 text-capitalize"><?= $item->userInfo->job ?? '' ?></span>
                            <div class="faded">
                                <p><?= substr($item->userInfo->about ?? '', 0, 50) ?>...</p>
                                <?= Tools::renderTeacherSocials($item->socialAccount) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>


<?php
if (!$indexCourse) {
    ?>
    <h2>Guruxlar hozircha yo'q!</h2>
    <?php
} else {
    ?>
    <section class="ftco-section bg-light" id="course_wrapper">
        <div class="container">
            <h2>Guruxlar</h2>
            <br>
            <div class="row">
                <?php
                foreach ($indexCourse as $item) {
                    ?>
                    <div class="project-wrap col-md-4">
                        <a href="<?= Url::to(['course/view', 'id' => $item->id]) ?>" class="img"
                           style="background-image: url(<?= Yii::getAlias('@images') . '/' . $item->image ?>)">
                            <span class="price"><?= $item->category->name ?></span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="<?= Url::to(['course/view', 'id' => $item->id]) ?>"><?= $item->title ?></a>
                            </h3>
                            <p class="advisor">O'qituvchi: <span><a
                                            href="<?= Url::to(['teachers/view', 'id' => $item->teacher->id]) ?>"><?= $item->teacher->full_name ?></a></span>
                            </p>
                            <ul class="d-flex justify-content-between">
                                <a href="<?= Url::to(['course/view', 'id' => $item->id, 't_id' => $item->teacher->id]) ?>">Qabulga
                                    yozilish</a>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>