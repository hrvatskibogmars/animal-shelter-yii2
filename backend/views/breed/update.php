<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Breed */

$this->title = 'Update Breed: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Breeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="breed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
