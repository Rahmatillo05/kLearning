<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/**
 * @var yii\data\ActiveDataProvider $dtm
 */

$this->title = 'DTM tests';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header card-title"><?= Html::encode($this->title) ?></div>

    <div class="card-body">
        <p>
            <?= Html::a('Yangi test', ['/manager/dtm/new'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= ListView::widget([
            'dataProvider' => $dtm,
            'layout' => "{items} \n {pager}",
            'itemView' => '_dtm_item',
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-4'
            ],
            'pager' => [
                'class' => LinkPager::class
            ]
        ]) ?>
    </div>

</div>
