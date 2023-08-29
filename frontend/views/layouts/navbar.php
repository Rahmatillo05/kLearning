<?php
$route = Yii::$app->controller->route;

use yii\helpers\StringHelper;
use yii\helpers\Url;
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= Url::home() ?>"><span>Kelajak</span>EDU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= ($route == '/' || $route == 'site/index') ? 'active' : '' ?>">
                    <a href="<?= Url::home() ?>" class="nav-link">Asosiy</a>
                </li>
                <li class="nav-item <?= ($route == 'site/about') ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/site/about']) ?>" class="nav-link">Biz haqimizda</a>
                </li>
                <li class="nav-item <?= ($route == 'course/index') ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/course/index']) ?>" class="nav-link">Kurslar</a>
                </li>
                <li class="nav-item <?= ($route == 'teachers/index') ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/teachers/index']) ?>" class="nav-link">O'qituvchilar</a>
                </li>
                <li class="nav-item <?= ($route == 'dtm/index') ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/dtm/index']) ?>" class="nav-link">DTM Testlar</a>
                </li>
                <li class="nav-item <?= ($route == 'site/contact') ? 'active' : '' ?>">
                    <a href="<?= Url::to(['/site/contact']) ?>" class="nav-link">Fikringiz</a>
                </li>
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <li class="nav-item <?= ($route == 'site/login') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/site/login']) ?>" class="nav-link"><?= StringHelper::truncateWords(Yii::$app->user->identity->full_name, 1) ?></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= Url::to(['/site/login']) ?>" class="nav-link">Kirish</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
