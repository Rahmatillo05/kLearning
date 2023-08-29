<?php

use common\models\groups\Family;
use common\models\groups\FamilyList;
use common\models\groups\Group;
use common\widgets\StaticSource;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/**
 * @var Group $group
 * @var View $this
 * @var FamilyList $pupil_list
 * @var Family $family
 */
$this->title = $group->name;
$color = StaticSource::cardHeaderColors();
?>

<div class="card">
    <div class="card-header card-title <?= $color ?>"><?= $this->title ?></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-md-flex justify-content-between <?= $color ?>">
                        <h3 class="card-title <?= $color ?>">Dars jadvali</h3>
                    </div>
                    <div class="card-bdy">
                        <?= Tools::renderSchedule($group->schedule) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-md-flex justify-content-between <?= $color ?>">
                        <h3 class="card-title <?= $color ?>">Guruh haqida</h3>
                    </div>
                    <div class="card-bdy">
                        <?= DetailView::widget([
                            'model' => $group,
                            'options' => [
                                'class' => 'table'
                            ],
                            'attributes' => [
                                'name',
                                [
                                    'attribute' => 'status',
                                    'value' => Tools::setStatusBadge($group->status),
                                    'format' => 'raw'
                                ],
                                [
                                    'attribute' => 'teacher_id',
                                    'value' => function ($model) {
                                        return Html::a($model->teacher->full_name, ['/teachers/view', 'id' => $model->id]);
                                    },
                                    'format' => 'html'
                                ],
                                'created_at:date'
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title <?= $color ?>">O'quvchilar ro'yhati</div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>T/R</th>
                            <th>F.I.SH</th>
                            <th>Telefon raqami</th>
                        </tr>
                        </thead>
                        <?php $i = 1;
                        foreach ($group->familyLists as $familyList): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $familyList->family->pupil->full_name ?></td>
                                <td><?= $familyList->family->pupil->tel_number ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
