<?php

/**
 * @var Course $model
 * @var Course $otherCourse
 * @var Category $categories
 * @var WaitList $wait_list
 */

use common\models\course\Category;
use common\models\course\Course;
use common\models\groups\WaitList;
use yii\helpers\Url;

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => 'Kurslar', 'url' => ['course/index']];

?>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 offset-xl-0 offset-lg-0 offset-md-2 offset-sm-0 offset-0">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch ftco-animate">
                        <div class="project-wrap">
                                <span href="" class="img"
                                      style="background-image: url(<?= Yii::getAlias('@images') . '/' . $model->image ?>);">
                                    <span class="price"><?= $model->category->name ?></span>
                                </span>
                            <div class="text p-4">
                                <h3><span><?= $model->title ?></span></h3>
                                <p class="advisor"> O'qituvchi : <a href="<?= Url::to(['/teachers/view', 'id' => $model->id]) ?>"><?= $model->teacher->full_name ?></a></p>
                                <p class="advisor"><?= $model->description ?></p>
                                <ul class="d-flex justify-content-between">
                                    <li><span class="flaticon-shower">Birinchi darsimiz:</span></li>
                                    <li class="price"><?= $model->first_lesson ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 offset-xl-0 offset-lg-0 offset-md-2 offset-sm-0 offset-0 mt-3">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <?= $this->render('_wait-list', [
                                'model' => $wait_list
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

