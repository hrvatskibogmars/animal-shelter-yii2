<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */
/* @var $form yii\widgets\ActiveForm */;

?>
<div class="col-md-6">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'nickname')->textInput() ?>
  <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::className(), [
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
      'options' => ['accept' => 'image/*'],
    ]);?>    <?= $form->field($model, 'galleryFiles')->widget(FileInput::classname(), [
      'options' => ['multiple' => true],
    ]);?>

    <?= Html::activeDropDownList($model, 'specie', $specie) ?>
    <?= Html::activeDropDownList($model, 'breed', $breed) ?>

    <?= $form->field($model, 'description')->textarea(['rows'=>'6']) ?>

  </div>
  <div class="col-md-6">

    <?= $form->field($model, 'sex_male')->checkbox() ?>

    <?= $form->field($model, 'approved')->checkbox() ?>
    <?= $form->field($model, 'featured')->checkbox() ?>

    <?= $form->field($model, 'vaccinate')->checkbox() ?>
    <?= $form->field($model, 'foster_care')->checkbox() ?>
    <?= $form->field($model, 'parasite')->checkbox() ?>
    <?= $form->field($model, 'castrated')->checkbox() ?>
    <?= $form->field($model, 'rabies')->checkbox() ?>
    <?= $form->field($model, 'infectious_diseases')->checkbox() ?>
  </div>
  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>
  <?php ActiveForm::end(); ?>
