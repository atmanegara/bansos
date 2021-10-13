<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

?>
<div class="menu-hibah-items-index">

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
          'pjax' => true, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
  [
                'header'=>false,
              'class'=> 'kartik\grid\ExpandRowColumn',
                'value'=>function($model,$key,$index){
        return GridView::ROW_EXPANDED;
                },
              'detail'=> Url::to(['menu-items-detail'])  
            ],
            'label',
            'icon',
            'url:url',
            //'items',
            //'visible',
            //'id_user',
                        [
                            'class'=> 'kartik\grid\ActionColumn',
                            'template'=>'{ubah-hak}',
                            'buttons'=>[
                                'ubah-hak'=>function($data,$url){
                                $url = Url::to(['ubah-hak']);
                                return \yii\bootstrap\Html::a('Update', $url, [
                                    'class'=>'btn btn-warning'
                                ]);
                                }
                            ]
                        ]

        ],
    ]); ?>
</div>
