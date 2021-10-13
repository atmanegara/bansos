<?php
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>

<?=
GridView::widget([
    'panel'=>[
        'heading'=>'Daftar Menu User',
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
                'detail'=>function($data,$url){
                    $url = Url::to(['tambah-permission']);
                    return Html::a("<i class='fa fa-plus'>Permisson</i>", $url,[
                        'class'=>'btn btn-flat btn-primary'
                    ]);
                }
            ]
        ]
    ]
])
?>
