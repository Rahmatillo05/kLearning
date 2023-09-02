<?php

use common\models\user\User;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var User $model */
/**
 * @var \frontend\modules\owner\controllers\PupilController $family
 */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header card-title">
                Mening ota-onam
            </div>
            <div class="card-body">
                <?= DetailView::widget([
                    'model' => $family->parent,
                    'options' => [
                        'class' => 'table table-bordered'
                    ],
                    'attributes' => [
                        'full_name',
                        'username',
                        'tel_number',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Tools::setStatusBadge($model->status);
                            },
                            'format' => 'html'
                        ],
                        'created_at:date',
                        'updated_at:date',
                        [
                            'attribute' => 'role',
                            'value' => Tools::ruleName($family->parent->role)
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <h4 class="card-header card-title">Men haqimda malumot</h4>
            <div class="card-body">
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'class' => 'table table-bordered'
                    ],
                    'attributes' => [
                        'full_name',
                        'username',
                        'tel_number',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Tools::setStatusBadge($model->status);
                            },
                            'format' => 'html'
                        ],
                        'created_at:date',
                        'updated_at:date',
                        [
                            'attribute' => 'role',
                            'value' => Tools::ruleName($model->role)
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

