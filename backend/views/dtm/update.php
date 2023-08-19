<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\dtm\Subject $model */

$this->title = 'Edit subject: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">

            <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

            <div class="card-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>

        </div>
    </div>
</div>
