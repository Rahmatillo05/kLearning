<?php

use yii\bootstrap5\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$route = Yii::$app->controller->route;

?>

<?php if ($route == '' || $route  == 'site/index') : ?>
<div class="hero-wrap js-fullheight" style="background-image: url('<?= Url::base() ?>/front/images/bg_3.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <span class="subheading">Keljak Academy ga xush kelibsiz!</span>
                <h1 class="mb-4">Kelajagingizni Kelajak Academy bilan quring</h1>

                <p class="mb-0">
                    <a href="<?= Url::to(['course/index']) ?>" class="btn btn-primary">Bizning kurslarimiz</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= Url::base() ?>/front/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Certified Instructor <i class="fa fa-chevron-right"></i></span></p> -->
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'] ?? [],
                    'tag' => 'p',
                    'itemTemplate' => "<span class='mr-2'>{link} <i class='fa fa-chevron-right'></i></span>\n",
                    'activeItemTemplate' => "<span>{link} </span>\n",
                    'options' => [
                        'class' => 'breadcrumbs'
                    ]
                ]); ?>
                <h1 class="mb-0 bread"><?= Html::encode($this->title, $doubleEncode = true) ?></h1>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>