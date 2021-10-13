<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Pemohons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-pemohon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Pemohon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tahun',
            'nik',
            'nama',
            'id_ref_jkel',
            //'tmp_lahir',
            //'tgl_lahir',
            //'alamat',
            //'rt',
            //'rw',
            //'desa',
            //'id_ref_kec',
            //'id_ref_agama',
            //'id_ref_status_kawin',
            //'id_ref_pekerjaan',
            //'id_ref_warga',
            //'aktif',
            //'date_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
