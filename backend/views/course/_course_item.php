<?php

/** @var common\models\course\Course $model */

use common\widgets\Tools;
use yii\helpers\Url;

?>
<div class="card overflow-hidden rounded-2">
    <div class="position-relative">
        <a href="<?= Url::to(['/course/view', 'id' => $model->id]) ?>">
        <?= Tools::imageRender($model->image, ['class' => 'card-img-top rounded-0']) ?>
        </a>

        <div class="card-body pt-3 p-4">
            
            <h3><a href="<?= Url::to(['/course/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></h3>
            <div class="d-flex align-items-center justify-content-between">
                <a href="<?= Url::to(['/course/view', 'id' => $model->id]) ?>" class="btn btn-primary"><?= $model->category->name ?></a>
                <?= Tools::renderRating() ?>
            </div>
        </div>
    </div>
</div>