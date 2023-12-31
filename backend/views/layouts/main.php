<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Toastr;
use kartik\icons\FontAwesomeAsset;
use lavrentiev\widgets\toastr\NotificationBase;
use yii\bootstrap5\Html;

AppAsset::register($this);
FontAwesomeAsset::register($this)
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <?= $this->render('sidebar') ?>

        <div class="body-wrapper">
            <?= $this->render('header') ?>
            <div class="container-fluid">
                <?= Toastr::widget([
                        'options' => [
                            "positionClass" => NotificationBase::POSITION_TOP_CENTER
                        ]
                ]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
