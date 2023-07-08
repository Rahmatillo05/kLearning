<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\widgets\ListView;

$this->title = 'Kelajak Education';
?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Bugundan o'qishni boshlang</span>
                <h2 class="mb-4">O'zingizga kerakli katalogni tanlang</h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-12 text-center mt-5">
                <a href="<?= Url::to(['/course/index']) ?>" class="btn btn-secondary">Barcha kurslar</a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Bugundan o'qishni boshlang</span>
                <h2 class="mb-4">Kursingizni tanlang</h2>
            </div>
        </div>

    </div>
</section>
