<?php

use common\models\dtm\Subject;
use common\widgets\Tools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/**
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var Subject $model
 */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h1 class="card-header card-title"><?= Html::encode($this->title) ?></h1>

    <div class="card-body ">
        <p>
            <?= $this->render('_form', compact('model')) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-bordered'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Subject $model, $key, $index, $column) {
                        return Url::toRoute(["subject-$action", 'id' => $model->id]);
                    },
                    'buttons' => Tools::gridViewButtons()
                ],
            ],
        ]); ?>

    </div>

</div>
