<?php

use common\models\groups\Family;
use common\models\groups\FamilyList;
use common\models\groups\Group;
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
$this->title = $group->name
?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-md-flex justify-content-between">
                <h3 class="card-title">Dars jadvali</h3>
                <p>
                    <?= Html::a('<i class="ti ti-pencil"></i>', ['lesson-schedule', 'group_id' => $group->id], ['class' => 'btn btn-outline-info']) ?>

                </p>
            </div>
            <div class="card-bdy">
                <?= Tools::renderSchedule($group->schedule) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-md-flex justify-content-between">
                <h3 class="card-title">Guruh haqida</h3>
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
                            'value' => Tools::setStatusBadgeAsIcon($group->status),
                            'format' => 'raw'
                        ],
                        'created_at:date'
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->render('pupil', compact('pupil_list', 'family')) ?>
