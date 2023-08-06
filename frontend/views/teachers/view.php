<?php

use common\models\user\User;
use common\widgets\Tools;
use yii\helpers\Url;
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
                        <div class="img align-self-stretch d-flex align-items-end"
                             style="background-image: url(<?= $model->userInfo->image ? Yii::getAlias('@images') . '/' . $model->userInfo->image : '' ?>);">
                            <div class="text mb-4 text-md-center">
                                <h3><?= $model->full_name ?></h3>
                                <h5 class="position mb-2 text-dark"><?= $model->userInfo->job ?? '' ?></h5>
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
                <h2 class="mb-4"><?= $model->full_name ?> ga tegishli boshqa kurslar</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($model->courses as $course) : ?>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="<?= Url::to(['/course/view', 'id' => $course->id]) ?>" class="img"
                           style="background-image: url(<?= Yii::getAlias('@images') . '/' . $course->image ?>);">
                            <span class="price"><?= $course->category->name ?></span>
                        </a>
                        <div class="text p-4">
                            <h3><a href="<?= Url::to(['/course/view', 'id' => $course->id]) ?>"><?= $course->title ?></a></h3>
                            <p class="advisor">Birinchi dars: <span><?= $course->first_lesson ?></span>
                            <ul class="d-flex justify-content-between">
                                <a href="<?= Url::to(['/course/view', 'id' => $course->id]) ?>">Qabulga
                                    yozilish</a>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>