<?php
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>

<?=
GridView::widget([
    'panel'=>[
        'heading'=>'Daftar Hibah',
        'type'=>'primary'
    ],
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
          'class'=> 'kartik\grid\SerialColumn'  
        ],
        'nm_hibah',
        [
            'class'=> 'kartik\grid\ActionColumn',
            'template'=>'{tampil}',
            'buttons'=>[
                'tampil'=>function($url,$data){
    $url = Url::to(['view-pemohon-hibah','id_hibah'=>$data['id']]);
    return Html::a('Tampil', $url,['class'=>'btn btn-warning']);
                }
            ]
        ]
    ]
])
?>
