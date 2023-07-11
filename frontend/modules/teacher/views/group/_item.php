<?php

use common\models\groups\Group;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var Group $model
 */

?>

<div class="card">
    <div class="card-header d-md-flex justify-content-between">
        <h5 class="card-title">
            <?= $model->name ?>
            <?= Tools::setStatusBadgeAsIcon($model->status) ?>
        </h5>
        <p>
            <?= Html::a('<i class="ti ti-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a('<i class="ti ti-clock"></i>', ['lesson-schedule', 'gorup_id' => $model->id], ['class' => 'btn btn-info btn-sm']) ?>
            <?= Html::a('<i class="ti ti-trash"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card-body p-2">
        <?= Tools::renderSchedule($model->schedule) ?>
    </div>
    <div class="text-center card-footer">
        <?= Html::a('To\'liq <i class="ti ti-arrow-right"></i>', ['view', 'id' => $model->id], ['class' => 'btn btn-primary w-100']) ?>
    </div>
</div>