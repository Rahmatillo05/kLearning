<?php
/**
 * @var Course $model
 */

use common\models\course\Course;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>



<div class="project-wrap">
    <a href="<?= Url::to(['course/view', 'id' => $model->id]) ?>" class="img" style="background-image: url(<?= Yii::getAlias('@images') . '/' . $model->image ?>)">
        <span class="price"><?= $model->category->name ?></span>
    </a>
    <div class="text p-4">
        <h3><a href="<?= Url::to(['course/view', 'id' => $model->id]) ?>"><?= $model->title ?></a></h3>
        <p class="advisor">O'qituvchi: <span><a href="<?= Url::to(['teachers/view', 'id' => $model->teacher->id]) ?>"><?= $model->teacher->full_name ?></a></span>
        </p>
        <ul class="d-flex justify-content-between">
            <a href="<?= Url::to(['/course/online-apply', 'id' => $model->id, 't_id' => $model->teacher->id]) ?>">Qabulga yozilish</a>
        </ul>
    </div>
</div>
