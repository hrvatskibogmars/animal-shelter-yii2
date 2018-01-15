<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AnimalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Animals';
?>
<div class="col-md-12">
  <div class="animal-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Animal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'nickname',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
