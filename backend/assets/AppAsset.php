<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
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
