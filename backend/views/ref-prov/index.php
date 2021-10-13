<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefProvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Refrensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-prov-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel'=>[
            'heading'=>'Daftar Provinsi',
            'type'=>'primary',
            'footer'=>false,
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',
            'nm_prov:text:Nama Provinsi',
       [
         'header'=>'Status Aktif',
           'attribute'=>'aktif',
           'value'=>function($data,$url){
        return $data['aktif']=='Y' ? "Aktif" : "Non Aktif";
           }
       ],
       //     'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
