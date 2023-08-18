<?php

/** @var yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use lavrentiev\widgets\toastr\NotificationBase;
use lavrentiev\widgets\toastr\NotificationFlash;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <?= $this->render('navbar') ?>
    <?=  $this->render('banner') ?>
    <?= NotificationFlash::widget([
        'options' => [
            "positionClass" => NotificationBase::POSITION_TOP_FULL_WIDTH
        ]
    ]) ?>
    <?= $content ?>
    <?= $this->render('footer') ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>