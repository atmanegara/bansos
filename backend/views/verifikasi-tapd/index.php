<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VerifikasiTapdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Verifikasi Hibah (Tim TAPD)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-tapd-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cetak ', ['/laporan/cetak-data-tapd'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
            'heading'=>'Daftar Pemohon Hasil Verifikasi',
            'type'=>'success',
            'footer'=>false,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_data_pemohon_hibah',
            'status_verifikasi',
            'catatan',
            'pagu_usulan',
            //'id_user',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
