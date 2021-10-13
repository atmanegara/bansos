<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuHibahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Hibahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-hibah-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu Hibah', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Hak User',['permission'],[
            'class'=>'btn btn-warning'
        ]); ?>
    </p>

    <?= GridView::widget([
        'panel'=>[
            'heading'=>'Daftar Menu',
            'type'=>'primary',
            'footer'=>false
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'kd_menu',
            'nourut',
            [
                'header'=>false,
              'class'=> 'kartik\grid\ExpandRowColumn',
                'value'=>function($model,$key,$index){
        return GridView::ROW_COLLAPSED;
                },
              'detailUrl'=> Url::to(['menu-items-detail'])  
            ],
            'label',
            'icon',
            'url:url',
            //'items',
            //'visible',
            //'id_user',
            //'kd_user',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}{delete}{submenu}',
            'buttons'=>[
                'submenu'=>function($data,$url){
        $url = Url::to(['submenu']);
        return Html::a('Sub Meu',$url,[
            'class'=>'btn btn-warning'
        ]);
                }
            ]
                ]
        ],
    ]); ?>
</div>
