<?php
use kartik\grid\GridView;
use yii\bootstrap\Html;
$id_hibah = Yii::$app->request->get('id_hibah');
$this->title=false;
?>

<p>
    
        <?= Html::a('Cetak ', ['/laporan/cetak-data-tapd-by-id','id_hibah'=>$id_hibah], ['class' => 'btn btn-success']) ?>
</p>
<?= 
GridView::widget([
    'panel'=>[
            'heading'=>'Daftar Pemohon Hasil Verifikasi',
            'type'=>'success',
            'footer'=>false,
        ],
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
          'class'=> '\kartik\grid\SerialColumn'  
        ],
        'nama:text:Nama Pengaju',
        'nm_tempat:text:Tampet',
        'nm_keg:text:Kegiatan',
        [
            'header'=>false,
          'class'=> 'kartik\grid\ExpandRowColumn',
          'value'=>function($model,$key,$index){
            return  GridView::ROW_COLLAPSED;
          },
          'detailUrl'=> yii\helpers\Url::to(['detail-permohonan'])
        ],
        [
          'header'=>'Verifikasi',
            'format'=>"html",
            'value'=>function($data,$url){
    $html='';
                switch ($data['status_verifikasi']){
                    case 1:
                        $html = "<span class='label label-danger'>Di tolak</span>";
                        break;
                    case 2:
                        $html = "<span class='label label-success'>Di setujui </span>";
                        break;
                    case 3:
                        $html = "<span class='label label-warning'>Di tunda</span>";
                        break;
                    
                }
                return $html;
            }
        ],
    ]
])
?>