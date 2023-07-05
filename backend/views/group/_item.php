<?php

use common\models\groups\Group;
use common\widgets\Tools;
use yii\helpers\Url;

/**
 * @var Group $model
 */


?>

<a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="list-group-item list-group-item-action ">
    <div class="row text-md-center">
        <div class="col-md-2"><h6><?= $model->name; ?></h6></div>
        <div class="col-md-3"> <?= $model->teacher->full_name ?></div>
        <div class="col-md-2"><?= Tools::dateFormat($model->created_at) ?></div>
        <div class="col-md-2"><?= Tools::setStatusBadge($model->status) ?></div>
        <div class="col-md-1"><span class="badge bg-secondary rounded-5"><?= Tools::groupPupil($model->id) ?></span></div>
    </div>
</a>

