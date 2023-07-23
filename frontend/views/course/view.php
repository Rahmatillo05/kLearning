<?php

/**
 * @var Course $model
 * @var Course $otherCourse
 * @var Category $categories
 */

use common\models\course\Category;
use common\models\course\Course;
use yii\helpers\Url;

$this->title = $model->title;

$this->params['breadcrumbs'][] = ['label' => 'Kurslar', 'url' => ['course/index']];

?>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">

                <h1 class="mb-3"><?= $model->title ?></h1>
                <p>
                    <img src="<?= Yii::getAlias('@images') . '/' . $model->image ?>" alt="<?= $model->title ?>"
                         class="img-fluid w-100">
                </p>
                <p><?= $model->description ?></p>
                <div class="d-flex justify-content-between">
                    <p class="advisor">O'qituvchi: <span><a
                                href="<?= Url::to(['teachers/view', 'id' => $model->teacher->id]) ?>"><?= $model->teacher->full_name?></a></span>
                    </p>
                </div>
                <a href="<?= Url::to(['/course/online-apply', 'id' => $model->id, 't_id' => $model->teacher->id]) ?>" class="btn btn-flat btn-outline-primary mt-3">Qabulga yozilish</a>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5 mt-5">
                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Kataloglar</h3>
                        <?php foreach ($categories as $category) : ?>
                            <li><a href="<?= Url::to(['course/index']) ?>"><?= $category->name ?> <span>(<?= count($category->courses) ?>)</span></a></li>
                        <?php endforeach; ?>
                    </div>
                </div>



            </div>

        </div>
    </div>
</section> <!-- .section -->

