<?php

use common\models\groups\FamilyList;
use common\models\groups\LessonSchedule;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\groups\Group $model */
/**
 * @var FamilyList $family
 * @var FamilyList[] $pupil_list
 * @var LessonSchedule $schedule
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">

    <h1 class="card-title card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Lesson schedule', ['lesson-schedule', 'group_id' => $model->id], ['class' => 'btn btn-success']) ?>
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
                'name',
                [
                    'attribute' => 'status',
                    'value' => Tools::setStatusBadge($model->status),
                    'format' => 'html'
                ],
                'created_at:date',
            ],
        ]) ?>
    </div>
    <h2 class="card-header card-title">Lesson schedule</h2>
    <div class="card-body">
        <?= Tools::renderSchedule($schedule) ?>
    </div>
</div>
<?= $this->render('pupil', compact('pupil_list', 'family')) ?>
