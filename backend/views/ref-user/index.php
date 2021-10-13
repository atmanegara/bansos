<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = false;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Kelompok User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
          //  'kd_user',
            'nm_user',
            'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
