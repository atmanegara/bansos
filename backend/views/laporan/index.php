<?php
use kartik\grid\GridView;
use yii\bootstrap\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
?>
<div class="row">
    <div class="col-md-6 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <div class="col-md-4">
<?php
echo Html::label('Pemohon Hibah', 'id-pemohon-hibah');
echo Select2::widget([
                    'id'=>'id-pemohon-hibah',
    'name'=>'pemohon-hibah',
                 //   'data'=>[]
                ]); ?>                                        
                </div>
                <div class="col-md-4">
<?php
echo Html::label('Pemohon Hibah', 'id-pemohon-hibah');
echo Select2::widget([
                    'id'=>'id-pemohon-hibah',
    'name'=>'pemohon-hibah',
                 //   'data'=>[]
                ]); ?>                                        
                </div>
                <div class="col-md-4">
<?php
echo Html::label('Pemohon Hibah', 'id-pemohon-hibah');
echo Select2::widget([
                    'id'=>'id-pemohon-hibah',
    'name'=>'pemohon-hibah',
                 //   'data'=>[]
                ]); ?>                                        
                </div>

                      

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-6">
<div class="panel panel-primary">
    <div class="panel-heading">
        <label class="panel-title">Laporan LPJ</label>
    </div>
    <div class="panel-body">
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
                $url = Url::to(['view-lpj','id'=>$data['id']]);
                return Html::a('Tampil Lap.', $url, [
                    'class'=>'btn btn-warning'
                ]);
                },
                'input'=>function($url,$data){
                    $url = Url::to(['input-lpj','id'=>$data['id']]);
                    return Html::a('Input PBJ', $url, ['class'=>'btn btn-primary']);
                }
            ]
        ]
    ]
])
?>        
    </div>
</div>        
    </div>
</div>


