<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\user\User $model */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card">

    <h4 class="card-header card-title"><?= Html::encode($this->title) ?></h4>
    <div class="card-body">
        <?= $this->render('_form_', [
            'model' => $model,
        ]) ?>
    </div>

</div>
