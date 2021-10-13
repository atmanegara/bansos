<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use dosamigos\leaflet\layers\TileLayer;
use dosamigos\leaflet\LeafLet;
use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\plugins\geosearch\GeoSearch;
use dosamigos\leaflet\layers\Marker;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohonHibah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-pemohon-hibah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali Ke daftar', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    <?= Html::a("<i class='fa fa-plus'>Upload Berkas Hibah</i>", ['/dok-pemohon-hibah/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //      'id',
            [
                'label' => 'Nama Pemohon',
                'value' => $model->refPemohon->nama
            ],
            [
                'label' => 'Nama Hibah',
                'value' => $model->hibah->nm_hibah
            ],
            'nm_keg',
            'lokasi',
            //       'lat',
            //        'lang',
            'no_telp',
        ],
    ])
    ?>
    <?php
    echo Html::label("Lokasi kegiatan : Lat : $model->lat , Lng : $model->lang");
    $center = new LatLng([
        'lat' => $model->lat, 'lng' => $model->lang]);

    $geoSearchPlugin = new GeoSearch([
        'service' => GeoSearch::SERVICE_OPENSTREETMAP,
        // uncomment following block to define custom labels
        'clientOptions' => [
            'searchLabel' => 'Masukkan Lokasi Kegiatan .... (Ex : kantor pemerintah daerah, barabai)',
            'notFoundMessage' => 'Lokasi tidak ditemukan :(',
        ],
    ]);

    $tileLayer = new TileLayer([
        'urlTemplate' => 'https://a.tile.openstreetmap.org/{z}/{x}/{y}.png',
        'clientOptions' => [
            'attribution' => 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            'subdomains' => '1234'
        ]
    ]);
// add a marker to center
    $marker = new Marker([
        'name' => 'geoMarker',
        'latLng' => $center,
        'clientOptions' => ['draggable' => false], // draggable marker
        'clientEvents' => [
            'click' => new JsExpression('function(e){ console.log(e); }')
        ]
    ]);

    $leafLet = new LeafLet([
        'name' => 'geoMap',
        'tileLayer' => $tileLayer,
        'center' => $center,
        'zoom' => 20,
        'clientOptions' => ['draggable' => false, 'scrollWheelZoom' => false],
    ]);
// add the marker
    $leafLet->addLayer($marker);
// add the plugin
//$leafLet->installPlugin($geoSearchPlugin);
// run the widget (you can also use dosamigos\leaflet\widgets\Map::widget([...]))
    echo $leafLet->widget([
        'height' => '500px',
    ]);
    ?>
    <div class="row">
        <div class="col-md-12">
    <?=
    GridView::widget([
        'panel'=>[
            'heading'=>'Daftar Dok Persyaratan',
            'type'=>'success',
            'footer'=>false
        ],
        'pjax' => true,
        'dataProvider' => $dataProvider,
        //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //    'id',
            //    'id_data_pemohon_hibah',
            //     'id_dok_syarat_hibah',
            [
                'header' => 'Nama Persyaratan',
                'value' => 'dokSyaratHibah.nm_dok'
            ],
            'nama_file',
         //   'tgl_upload',
         //   'reupload',
            //'catatan',
            //'id_user',
            //'create_date',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {tampil} {reupload}',
                'buttons' => [
                    'update'=>function($url,$data,$key){
                        $url= Url::to(['update','id'=>$key]);
                        return Html::a("<i class='fa fa-edit'></i>", $url, [
                             'title' => 'Ganti Berkas',
                            'class'=>'btn btn-success'
                        ]);
                    },
                            'delete'=>function($url,$data,$key){
                            $url = Url::to(['delete-by-id','id'=>$key]);
                            return Html::a("<i class='fa fa-trash'></i>",$url,[
                                 'title' => 'Hapus Berkas',
                                'class'=>'btn btn-danger',
                                'data'=>[
                                    'method'=>'post',
                                    'confirm'=>'Apakah anda yakin?'
                                ]
                            ]);
                            },
                    'tampil' => function($url, $data) {
                        $url = Url::to(['/dok-pemohon-hibah/tampil-dok', 'id' => $data['id']]);
                        return yii\bootstrap\Html::button("<i class='fa  fa-file-archive-o'></i>", [
                                    'title' => 'Tampil Berkas',
                                    'value' => $url,
                                    'class' => 'btn btn-info showModalButton'
                        ]);
                    },
                            'reupload'=>function($url,$data){
                        if ($data['reupload']==1){
                            $html = Html::a('Perbaikan', $url, ['class'=>'btn btn-warning']);
                        }else{
                            $html='';
                        }
                        return $html;
                            }
                ]
            ],
        ],
    ]);
    ?>
        </div>
    </div>
</div>
<?php
if(in_array(Yii::$app->user->identity->kd_user,['102','999'])){
$hidden = false;
    }else{
$hidden = true;
    }
Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'options' => [
        'style' => ['padding-top' => '70px']
    ],
    'footerOptions' => [
        'hidden' => $hidden,
    ],
    "footer" =>
    '<div class="row"><div class="col-md-5">' .
    Html::label('Catatan', 'catatan').
    Html::textarea('catatan', null, ['id' => 'catatan', 'class' => 'form-control']) .
    '</div>' . '<div class="col-md-3">' .
     Html::label('pagu_usulan', 'pagu_usulan').
    Html::textInput('pagu_usulan', null, ['id'=>'pagu_usulan','class' => 'form-control ']) .
    '</div>'
    . '<div class="col-md-2">' .
    Html::label('reupload', 'reupload').
    Html::dropDownList('reupload', null, ['2' => 'Setuju', '1' => 'Tolak'], ['id'=>'reupload', 'prompt'=>'Pilih Persetujuan ...','class' => 'form-control requeried']) .
    '</div>'
    . '<div class="col-md-2">' .
    Html::button('Simpan',
            ['class' => 'btn btn-primary', 'onClick' => "verifikasi()"]) . '</div>'
    . '</div>',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<script>
    function verifikasi(){
    var id =$('#pdfjs-pdfid').data('idnya');
    var catatan = $("#catatan").val();
    var reupload = $("#reupload").val();
    var pagu_usulan = $("#pagu_usulan").val();
    
    var posting = $.post("<?= Url::to(['/verifikasi-tapd/verifikasi-hibah']) ?>",{
        id : id,catatan:catatan,reupload:reupload,pagu_usulan:pagu_usulan
    });
    posting.always(function(){
        alert('selesai')
    })
    }
    </script>