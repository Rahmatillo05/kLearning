<?php

use common\models\course\Course;
use yii\helpers\Url;

/**
 * @var Course $model
 */

?>


<div class="project-wrap">
    <a href="<?= Url::to(['course/view', 'id' => $model->id]) ?>" class="img" style="background-image: url(<?= Yii::getAlias('@uploadFile') . '/' . $model->image ?>)">
        <span class="price"><?= $model->category->title ?></span>
    </a>
    <div class="text p-4">
        <h3><a href="<?= Url::to(['course/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></h3>
        <p class="advisor">O'qituvchi: <span><a href="<?= Url::to(['teachers/view', 'id' => $model->user->id]) ?>"><?= $model->user->first_name ?></a></span></p>
        <ul class="d-flex justify-content-between">
            <a href="<?= Url::to(['/course/wait-list', 'id' => $model->id, 't_id' => $model->user->id]) ?>">Qabulga yozilish</a>
        </ul>
    </div>
</div>