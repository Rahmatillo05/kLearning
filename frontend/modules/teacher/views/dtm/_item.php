<?php

/**
 * @var Dtm $model
 */

use common\models\dtm\Dtm;
use common\widgets\Detect;
use yii\helpers\Url;

?>
<style>
    .bgimg {
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: auto;
    }
</style>
<div class="card">
    <div class="card-header card-title">
        <?= $model->title ?>
        <?= Detect::dtmStatus($model->status) ?>
    </div>
    <div class="card-body bgimg" style="background-image: url(<?= Yii::$app->params['defaultImages'] . "/test.jpg" ?>);">
        <p>
            <b style="color: white;">Testda qatnashgan o'quvchilar soni: <?= count($model->dtmPupils) ?? 0 ?></b>
        </p>
        <p>
            <b style="color: white;">O'rtacha ball: <?= $model->avgScore ?></b>
        </p>
        <p>
            <b style="color: white;">Eng yuqori ball: <?= $model->maxScore ?></b>
        </p>
        <h5 class="text-white"><?= $model->start_date ?></h5>

        <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="btn btn-primary btn-block">To'liq ko'rish</a>
    </div>
</div>