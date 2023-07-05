<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/bootstrap.min.css",
        "css/animate.css",
        "css/owl.carousel.min.css",
        "css/themify-icons.css",
        "css/flaticon.css",
        "css/magnific-popup.css",
        "css/slick.css",
        "css/style.css"
    ];
    public $js = [
        "js/jquery-1.12.1.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/jquery.magnific-popup.js",
        "js/swiper.min.js",
        "js/masonry.pkgd.js",
        "js/owl.carousel.min.js",
        "js/jquery.nice-select.min.js",
        "js/slick.min.js",
        "js/jquery.counterup.min.js",
        "js/waypoints.min.js",
        "js/custom.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}
