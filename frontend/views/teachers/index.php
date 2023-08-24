<?php

/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $teachers
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = 'O\'qituvchilar';

$this->params['breadcrumbs'][] = $this->title;

?>


<section class="ftco-section bg-light">
    <div class="container">

        <?=
        ListView::widget([
            'dataProvider' => $teachers,
            'itemView' => '_item',
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-6 col-lg-4 ftco-animate d-flex align-items-stretch'
            ]
        ])
        ?>

    </div>
</section>