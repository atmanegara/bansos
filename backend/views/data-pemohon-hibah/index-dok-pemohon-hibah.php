<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DokPemohonHibahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dok Pemohon Hibahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dok-pemohon-hibah-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_data_pemohon_hibah',
            'id_dok_syarat_hibah',
            'nama_file',
            'tgl_upload',
            //'reupload',
            //'catatan',
            //'id_user',
            //'create_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
