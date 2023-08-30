<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\user\User $model */

$this->title = Yii::$app->request->get('pupil_id') ? 'Create Parent' : 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row mt-2">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h4 class="card-header card-title"><?= Html::encode($this->title) ?></h4>
            <div class="card-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
