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
      'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
      'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
      'css/bootstrap.min.css',
      'css/now-ui-kit.css',
      'css/demo.css',
    ];
    public $js = [
        //'js/core/jquery.3.2.1.min.js',
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',
        'js/plugins/bootstrap-switch.js',
        'js/plugins/nouislider.min.js',
        'js/plugins/bootstrap-datepicker.js',
        'js/now-ui-kit.js',
        'js/demo.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
      'css/bootstrap.min.css',
      'css/light-bootstrap-dashboard.css?v=2.0.1',
      'css/admin.css',
    ];
    public $js = [
        'js/core/jquery.3.2.1.min.js',
        'js/core/popper.min.js',
        'js/core/bootstrap.min.js',
        'js/plugins/bootstrap-switch.js',
        'js/plugins/chartist.min.js',
        'js/plugins/bootstrap-notify.js',
        'js/light-bootstrap-dashboard.js?v=2.0.1',
        'js/demo.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
