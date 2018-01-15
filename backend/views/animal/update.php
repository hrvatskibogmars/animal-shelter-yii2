<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */

$this->title = 'Update Animal: {nameAttribute}';
?>
<div class="animal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specie' => $specie,
        'breed' => $breed,
    ]) ?>

</div>
