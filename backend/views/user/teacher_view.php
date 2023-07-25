<?php

use common\models\user\TeacherSocialAccounts;
use common\models\user\User;
use common\models\user\UserInfo;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var User $model */
/** @var UserInfo $teacher_info */
/** @var TeacherSocialAccounts $teacher_social_account */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <h4 class="card-header card-title"><?= Html::encode($this->title) ?></h4>
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
                        'id',
                        'full_name',
                        'username',
                        'email:email',
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header card-title">Social accounts</h4>
                    <div class="card-body">
                        <?= $this->render('_teacher_social_accounts', ['model' => $teacher_social_account, 'teacher_id' => $model->id]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h4 class="card-header card-title">About Teacher</h4>
            <div class="card-body">
                <?= $this->render('_teacher_info', ['model' => $teacher_info, 'teacher_id' => $model->id]) ?>
            </div>
        </div>
    </div>

</div>
