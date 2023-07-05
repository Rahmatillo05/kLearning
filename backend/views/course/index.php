<?php

use common\models\course\Course;
use common\widgets\Tools;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h4 class="card-header card-title"><?= Html::encode($this->title) ?></h4>

    <div class="card-body">
        <p>
            <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_course_item',
            'options' => [
                'class' => 'row'
            ],
            'layout' => "{items} \n {pager}",
            'itemOptions' => [
                'class' => 'col-sm-6 col-xl-3'
            ],
            'pager' => [
                'class' => LinkPager::class
            ]
        ]) ?>
    </div>
</div>
