<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefProv */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Provs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-prov-view">
    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title"><?= $model->nm_prov ?></label>
        </div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'id',
            'nm_prov',
           [
               'label'=>"Status Aktif",
               'value'=>function($model){
                return $model['aktif']=='Y' ? "Aktif" : "Non Aktif";
               }
           ],
            'create_date',
        ],
    ]) ?>            
        </div>
    </div>


</div>
