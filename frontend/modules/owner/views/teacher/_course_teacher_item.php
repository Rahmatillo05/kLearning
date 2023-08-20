<?php

/** @var common\models\course\Course $model */

use common\widgets\Tools;
use yii\helpers\Url;

?>
<div class="card overflow-hidden rounded-2">
    <div class="position-relative">
        <a href="<?= Url::to(['course/view', 'id' => $model->id]) ?>">
            <?= Tools::imageRender($model->image, ['class' => 'card-img-top rounded-0']) ?>
        </a>
        <div class="card-body pt-3 p-4">
            <h6 class="fw-semibold fs-4"><?= $model->title ?></h6>
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-semibold fs-4 mb-0 badge bg-primary"><?= $model->category->name ?>
                </h6>
                <?= Tools::renderRating() ?>
            </div>
        </div>
    </div>
</div>