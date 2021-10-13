<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPenerimaHibahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penerima (SK) Hibahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-penerima-hibah-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Penerima Hibah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel'=>[
            'heading'=>'Data Penerima Hibah',
            'type'=>'success'
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_data_pemohon_hibah',
            'no_sk',
            'setuju',
            'catatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
