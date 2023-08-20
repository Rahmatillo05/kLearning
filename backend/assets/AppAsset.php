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
        'https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css',
        'https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css',
        'css/styles.min.css',
    ];
    public $js = [
        "libs/bootstrap/dist/js/bootstrap.bundle.min.js",
        "js/sidebarmenu.js",
        "js/app.min.js",
        "libs/apexcharts/dist/apexcharts.min.js",
        "libs/simplebar/dist/simplebar.js",
//        "js/dashboard.js",
//        'https://code.jquery.com/jquery-3.5.1.js',
        'https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js',
        'https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js',
        'https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js',
        'js/datatable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset',
    ];
}
