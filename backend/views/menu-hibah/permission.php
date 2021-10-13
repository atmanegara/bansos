<?php
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>

<?=
GridView::widget([
    'panel'=>[
        'heading'=>'Daftar User',
        'type'=>'primary',
        'footer'=>false
    ],
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> '\kartik\grid\SerialColumn'
        ],
        'nm_user',
        [
            'header'=>'Menu Hak',
            'class'=> 'kartik\grid\ExpandRowColumn',
            'value'=>function($model,$key,$index){
    return \kartik\grid\GridView::ROW_COLLAPSED;
            },
                    'detailUrl'=>Url::to(['menu-hak'])
        ],
        [
            'class'=> 'kartik\grid\ActionColumn',
            'template'=>'{detail}',
            'buttons'=>[
                'detail'=>function($url,$data){
                    $url = Url::to(['tambah-permission','kd_user'=>$data['kd_user']]);
                    return Html::a("<i class='fa fa-plus'>Permisson</i>", $url,[
                        'class'=>'btn btn-flat btn-primary'
                    ]);
                }
            ]
        ]
    ]
])
?>
