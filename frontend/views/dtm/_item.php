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
        <?= Detect::dtmStatus($model->status, true) ?>
    </div>
    <div class="card-body bgimg" style="background-image: url(<?= Yii::$app->params['defaultImages'] . "/test.jpg" ?>);">
        <p>
            <b style="color: white;">Testda qatnashgan o'quvchilar soni: 50</b>
        </p>
        <p>
            <b style="color: white;">O'rtacha ball: 150</b>
        </p>
        <p>
            <b style="color: white;">Eng yuqori ball: 190</b>
        </p>
        <p>
            <b style="color: white;">Eng past ball: 90</b>
        </p>
        <h5 class="text-white"><?= $model->start_date ?></h5>

        <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="btn btn-primary btn-block">To'liq ko'rish</a>
    </div>
</div>