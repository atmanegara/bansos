<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefHibahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Hibahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-hibah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Hibah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
   'id_ref_skpd',
         //   'id',
            'nm_hibah',
         
            'aktif',
            'create_date',

            ['class' => 'yii\grid\ActionColumn'
                ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
