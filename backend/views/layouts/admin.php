<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../img/dogo.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Šinterice dobrog srca
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= Url::to(['site/index']); ?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Upravljačka ploča</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Url::to(['animal/create']); ?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Dodaj Zivotinju</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Url::to(['animal/']); ?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>Pregled zivotinja</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Url::to(['breed/create']); ?>">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Dodaj pasminu</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= Url::to(['species/create']); ?>">
                            <i class="nc-icon nc-atom"></i>
                            <p>Dodaj tip zivotinje</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
          <?php $this->BeginBody() ?>
          <div class="container">
            <div class="row" style="padding:10px;">
              <?= $content ?>
            </div>
          </div>
          <?php $this->endBody() ?>
          </div>
        </div>


</body>
</html>
<?php $this->endPage() ?>
