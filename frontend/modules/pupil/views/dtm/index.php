<?php
/**
 * @var yii\web\View $this
 * @var ActiveDataProvider $dtm
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

$this->title = "DTM Testlar";
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="ftco-section contact-section">
    <div class="container">
        <?=
        ListView::widget([
            'dataProvider' => $dtm,
            'itemView' => '_item',
            'layout' => "{items} \n {pager}",
            'options' => [
                'class' => 'row'
            ],
            'itemOptions' => [
                'class' => 'col-md-6 col-lg-4 ftco-animate'
            ]
        ])
        ?>
    </div>
</section>