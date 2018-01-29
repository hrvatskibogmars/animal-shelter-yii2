<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */
/* @var $form yii\widgets\ActiveForm */;

?>
<div class="col-md-6">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'nickname')->textInput() ?>
  <?= $form->field($model, 'chipid')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'file')->widget(FileInput::classname(), [
    'attribute' => 'image',
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
       'initialPreview'=>[
         "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
       ],
       'initialPreviewAsData'=>true,

  ]]);?>
  <?= $form->field($model, 'galleryFiles')->widget(FileInput::classname(), [
    'options' => ['multiple' => true],
  ]);?>

  <?= $form->field($model, 'specie')->widget(Select2::classname(), [
    'data' => $specie,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
      'allowClear' => true
    ],
  ]); ?>
  <?= $form->field($model, 'breed')->widget(Select2::classname(), [
    'data' => $breed,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
      'allowClear' => true
    ],
  ]); ?>

  <?= $form->field($model, 'description')->textarea(['rows'=>'6']) ?>

</div>
<div class="col-md-6">
  <?= $form->field($model, 'birthday')->widget(
    DatePicker::className(),
    [
      // inline too, not bad
      'inline' => true,
      // modify template for custom rendering
      'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
      'clientOptions' => [
        'autoclose' => true,
        'format' => 'dd-MM-yyyy'
      ]
    ]
  );?>
  <?= $form->field($model, 'sex_male')->widget(Select2::classname(), [
    'data' => [1 => 'Muško', 2 => 'Žensko'],
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
      'allowClear' => true
    ],
  ]); ?>

  <?= $form->field($model, 'status')->widget(Select2::classname(), [
    'data' => [0 => 'Udomljen', 1 => 'Udomljava se', 2 => 'Rezerviran', 3 => 'Na liječenju', 4 => 'Sakriven'],
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
      'allowClear' => true
    ],  ]);?>
    <?= $form->field($model, 'featured')->checkbox() ?>
    <?= $form->field($model, 'vaccinated')->checkbox() ?>
    <?= $form->field($model, 'sterilized')->checkbox() ?>
  </div>
  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>
  <?php ActiveForm::end(); ?>
