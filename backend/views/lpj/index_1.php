<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LpjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lpjs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lpj-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lpj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_hibah',
            'id_data_pemohon_hibah',
            'nm_barang',
            'harga_barang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
