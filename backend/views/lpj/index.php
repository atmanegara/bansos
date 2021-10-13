<?php
use kartik\grid\GridView;
use yii\bootstrap\Html;
use yii\helpers\Url;
?>

<?= 
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
          'class'=> 'kartik\grid\SerialColumn'  
        ],
        'nm_hibah',
        [
            'class'=> 'kartik\grid\ActionColumn',
            'template'=>'{tampil} {input}',
            'buttons'=>[
                'tampil'=>function($url,$data){
                $url = Url::to(['view','id'=>$data['id']]);
                return Html::a('Tampil Lap.', $url, [
                    'class'=>'btn btn-warning'
                ]);
                },
                'input'=>function($url,$data){
                    $url = Url::to(['create','id'=>$data['id']]);
                    return Html::a('Input PBJ', $url, ['class'=>'btn btn-primary']);
                }
            ]
        ]
    ]
])
?>
