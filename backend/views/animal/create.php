<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */

$this->title = 'Create Animal';
?>
<div class="animal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specie' => $specie,
        'breed' => $breed,
    ]) ?>

</div>
