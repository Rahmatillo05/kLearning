<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var common\models\groups\Group $model */
$this->title = 'Create Group';
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <h3 class="card-header card-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form_', [
        'model' => $model,
    ]) ?>
</div>
