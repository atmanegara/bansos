<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPemohonHibahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohon Hibahs';
$this->params['breadcrumbs'][] = $this->title;
$id_ref_pemohon = Yii::$app->request->get('id_ref_pemohon');
?>
<div class="data-pemohon-hibah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Pemohon Hibah', ['create','id_ref_pemohon'=>$id_ref_pemohon], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_ref_pemohon',
            'id_hibah',
            'nm_keg',
            'lokasi',
            //'lat',
            //'lang',
            //'no_telp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
