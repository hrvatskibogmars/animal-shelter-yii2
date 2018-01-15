<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Breed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="breed-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeDropDownList($model, 'fk_species', $items) ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
