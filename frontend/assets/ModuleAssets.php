<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ModuleAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/module';
    public $css = [
        'css/styles.min.css',
    ];
    public $js = [
        "libs/bootstrap/dist/js/bootstrap.bundle.min.js",
        "js/sidebarmenu.js",
        "js/app.min.js",
        "libs/apexcharts/dist/apexcharts.min.js",
        "libs/simplebar/dist/simplebar.js",
        "js/dashboard.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}