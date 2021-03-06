<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VerifikasiBupatiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Verifikasi Bupatis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-bupati-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Verifikasi Bupati', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    <?php Pjax::end(); ?>
</div>
