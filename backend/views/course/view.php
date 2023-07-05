<?php

use common\widgets\Tools;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\course\Course $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">

    <h3 class="card-header card-title"><?= Html::encode($this->title) ?></h3>

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
                [
                    'attribute' => 'teacher_id',
                    'value' => $model->teacher->full_name
                ],
                [
                    'attribute' => 'category_id',
                    'value' => $model->category->name
                ],
                [
                    'attribute' => 'image',
                    'value' => Tools::viewImage($model->image),
                    'format' => 'html'
                ],

                'title',
                'description:ntext',
                'first_lesson',
                [
                    'attribute' => 'status',
                    'value' => Tools::setStatusBadge($model->status),
                    'format' => 'html'
                ],
                'created_at:date',
                'updated_at:date',
            ],
        ]) ?>

    </div>
    <h3 class="card-title card-header">Course review</h3>
    <div class="card-body p-4">
        <?php if ($model->courseReviews): foreach ($model->courseReviews as $courseReview) : ?>
            <ul class="timeline-widget mb-0 position-relative mb-n5">
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end"><?= date('H:i d.m.Y', $courseReview->created_at) ?></div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1"><?= $courseReview->feedback ?></div>
                </li>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                        <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">New sale recorded <a
                                href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                    </div>
                </li>
            </ul>
        <?php endforeach; else: ?>
            <h2 class="text-danger text-center">No comments yet</h2>
        <?php endif; ?>
    </div>
</div>
