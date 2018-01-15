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
    'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
    'css/light-bootstrap-dashboard.css?v=2.0.1',
    'css/demo.css',
  ];
    public $js = [
      //'js/core/jquery.3.2.1.min.js',
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
