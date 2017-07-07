<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'shop/fonts/css/font-awesome.css',
        'shop/css/select2.min.css',
        'shop/css/owl.carousel.css',
        'shop/css/jquery.fancybox.css',
        'shop/css/animate.css',
        'shop/css/reset.css',
        'shop/css/style.css', 
        'shop/css/responsive.css',
        'shop/css/option8.css',
        'shop/css/challenge.css'
    ];
    public $js = [
        'shop/js/select2.min.js',
        'shop/js/jquery.bxslider.min.js',
        'shop/js/owl.carousel.min.js',
        'shop/js/jquery.actual.min.js',
        'shop/js/jquery.elevatezoom.js',
        'shop/js/jquery.parallax-1.1.3.js',
        'shop/js/responsive-menu.js',
        'shop/js/theme-script.js',
        'shop/js/option8.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
?>