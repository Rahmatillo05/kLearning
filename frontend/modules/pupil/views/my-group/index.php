<?php

use common\models\groups\Family;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;

/**
 * @var View $this
 * @var Family $family
 */

$this->title = "Mening guruhlarim";
?>

<div class="card">
    <h3 class="card-header card-title"><?= $this->title ?></h3>
    <div class="card-body">
        <?= ListView::widget([
            'dataProvider' => $family->familyListAsProvider,
            'layout' => "{items}\n{pager}",
            'itemView' => '_item',
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                    'class' => 'col-md-6 col-lg-4'
            ]
        ]) ?>
    </div>
</div>
