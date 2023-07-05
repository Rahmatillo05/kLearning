<?php

use common\models\groups\Group;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <h1 class="card-title card-header"><?= Html::encode($this->title) ?></h1>
    <div class="card-body">

        <p>
            <?= Html::a('Create Group', ['create'], ['class' => 'btn btn-success']) ?>
        </p>


        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_item',
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => 'list-group'
            ],
            'pager' => [
                'class' => LinkPager::class
            ]
        ]) ?>
    </div>


</div>
