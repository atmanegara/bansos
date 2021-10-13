<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKabkot */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Kabkots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-kabkot-view">

   
    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-defalut']) ?>
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
      //      'id',
           [
               'attribute'=>"id_ref_prov",
             'header'=>"Nama Provinsi",
               'value'=>function($model){
        return $model->refProv->nm_prov;
               }
           ],
            'nm_kabkot',
            'aktif',
       //     'create_date',
        ],
    ]) ?>

</div>
