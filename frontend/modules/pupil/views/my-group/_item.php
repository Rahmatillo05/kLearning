<?php

use common\models\groups\FamilyList;
use common\widgets\StaticSource;
use common\widgets\Tools;
use yii\helpers\Html;

/**
 * @var FamilyList $model
 */
?>

<div class="card">
    <div class="card-header card-title <?= StaticSource::cardHeaderColors() ?>"><?= $model->group->name ?></div>
    <div class="card-body p-2">
        <?= Tools::renderSchedule($model->group->schedule, false, true) ?>
    </div>
    <div class="text-center card-footer">
        <?= Html::a('To\'liq <i class="ti ti-arrow-right"></i>', ['view', 'id' => $model->group_id], ['class' => 'btn btn-primary w-100']) ?>
    </div>
</div>
