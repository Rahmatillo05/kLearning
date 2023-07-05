<?php

use common\models\groups\Room;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h1 class="card-header card-title"><?= Html::encode($this->title) ?></h1>
    <div class="card-body">
        <p>
            <?= Html::a('Create Room', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}",
            'tableOptions' => [
                'class' => 'table table-bordered'
            ],
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => 'T\R'
                ],
                'name',
                'number',
                'capacity',
                [
                    'attribute' => 'responsible',
                    'value' => 'teacher.full_name'
                ],
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Room $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                    'buttons' => Tools::gridViewButtons()
                ],
            ],
        ]); ?>
    </div>


</div>
