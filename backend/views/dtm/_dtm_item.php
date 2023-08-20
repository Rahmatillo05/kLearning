<?php

/**
 * @var Dtm $model
 */

use common\models\dtm\Dtm;
use common\widgets\Detect;
use yii\helpers\Url;

?>

<div class="card">
    <div class="card-header card-title">
        <?= $model->title ?>
        <?= Detect::dtmStatus($model->status) ?>
    </div>
    <img src="<?= Yii::$app->params['defaultImages'] . "/test.jpg" ?>" class="card-img rounded-0"
         alt="<?= $model->title ?>">
    <div class="card-body">
        <p>
            <b>Testda qatnashgan o'quvchilar soni: 50</b>
        </p>
        <p>
            <b>O'rtacha ball: 150</b>
        </p>
        <p>
            <b>Eng yuqori ball: 190</b>
        </p>
        <p>
            <b>Eng past ball: 90</b>
        </p>
        <p>
            <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="btn btn-primary btn-block">To'liq ko'rish</a>
        </p>
    </div>
</div>
