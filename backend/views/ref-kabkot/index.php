<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefKabkotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Referensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kabkot-index">

   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data KabKota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
            'heading'=>'Daftar Kabupaten Kota',
            'type'=>'primary',
            'footer'=>false
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
         //   'id_ref_prov',
            [
              'header'=>'Nama Provinsi',
                'attribute'=>'id_ref_prov',
                'value'=>'refProv.nm_prov'
            ],
            'nm_kabkot',
            'aktif',
            'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
