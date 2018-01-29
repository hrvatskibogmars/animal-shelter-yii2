<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Animal */

$this->title = $model->name;
?>
<div class="col-md-12">
<div class="animal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'nickname',
            'birthday:datetime',
            'created_at:datetime',
            'updated_at:datetime',
            'vaccinated:boolean',
            'description',
            'breed',
            'specie',
            'image',
            [
              'label'=> 'Gallery',
              'value'=> implode(" | ", $model->gallery)
            ],

        ],
    ]) ?>

</div>
</div>
