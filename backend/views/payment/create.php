<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\payment\Payment $model */

$this->title = 'New payment';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h1 class="card-title card-header"><?= Html::encode($this->title) ?></h1>
    <div class="card-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>
