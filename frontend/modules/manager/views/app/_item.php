<?php
/**
 * @var Course $model
 */

use common\models\course\Course;
use common\widgets\Tools;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>



<div class="project-wrap">
    <?= Tools::imageRender($model->image, ['class' => 'card-img-top rounded-0']) ?>
    <div class="text p-4">
        <h5><a href="<?= Url::to(['app/view', 'id' => $model->id]) ?>"><?= $model->title ?></a><a href="<?= Url::to(['app/view', 'id' => $model->id]) ?>" class="price btn btn-primary ms-4"><?= $model->category->name ?></a></h5>
        <p class="advisor">O'qituvchi: <span><?= $model->teacher->full_name ?></span>

        </p>
        <ul class="d-flex justify-content-between">
            <a href="<?= Url::to(['app/view', 'id' => $model->id, 't_id' => $model->teacher->id]) ?>">Qabulga yozilish</a>
        </ul>
    </div>
</div>
