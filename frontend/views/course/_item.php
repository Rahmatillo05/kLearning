<?php
/**
 * @var Course $model
 */

use common\models\course\Course;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>
<div class="single_special_cource">
    <img src="<?= Yii::$app->params['viewPath'] . $model->image ?>" class="special_img" alt="<?= $model->title ?>">
    <div class="special_cource_text">
        <span class="btn_4"><?= $model->category->name ?></span>
        <a href="<?= Url::to(['view', 'id' => $model->id]) ?>">
            <h3><?= $model->title ?></h3>
        </a>
        <p><?= StringHelper::truncateWords($model->description, 10) ?></p>
        <div class="author_info">
            <div class="author_img">
                <img src="img/author/author_1.png" alt="">
                <div class="author_info_text">
                    <p>Conduct by:</p>
                    <h5><a href="#"><?= $model->teacher->full_name ?></a></h5>
                </div>
            </div>
            <div class="author_rating">
                <div class="rating">
                    <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                    <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                    <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                    <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                    <a href="#"><img src="img/icon/star.svg" alt=""></a>
                </div>
                <p>3.8 Ratings</p>
            </div>
        </div>
    </div>

</div>
