<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */


$this->title = "Mening guruhlarim";
?>

<div class="card">
    <div class="card-header card-title">
        <?= Html::encode($this->title) ?>
    </div>
    <div class="card-body">
        <p>
            <?= Html::a('Yangi guruh', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-4 p-2'
            ],
            'layout' => "{items}\n{pager}",
            'itemView' => '_item'
        ]) ?>
    </div>
</div>
