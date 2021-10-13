<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RefHibah;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
use dosamigos\leaflet\layers\TileLayer;
use dosamigos\leaflet\LeafLet;
use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\plugins\geosearch\GeoSearch;
use dosamigos\leaflet\layers\Marker;
use backend\models\RefPemohon;
/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohonHibah */
/* @var $form yii\widgets\ActiveForm */

$url = Url::to(['/ref-hibah/hibah-list']);
$nm_hibah = $model->isNewRecord ? '' : RefHibah::findOne($model->id_hibah)->nm_hibah;
$urlpemohon = Url::to(['/ref-pemohon/pemohon-list']);
$nama = $model->isNewRecord ? '' : RefPemohon::findOne($model->id_ref_pemohon)->nama;

?>

<div class="data-pemohon-hibah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref_pemohon')->widget(Select2::class,[
        'initValueText'=>$nama,
        'options'=>[
            'placeholder'=>'Pilih Pemohon...'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
            'minimumInputLength'=>3,
            'language'=>[
                'errorLoading'=>new JsExpression("function () {return 'Hadangi dulu...'}")
            ],
            'ajax'=>[
                'url'=>$urlpemohon,
                'dataType'=>'json',
                'data'=>new JsExpression("function(params){ return {q:params.term}; }")
            ],
            'eascapeMarkup'=>new JsExpression("function (markup) { return markup; }"),
            'templateResult'=>new JsExpression("function(pemohon) { return pemohon.text; }"),
            'templateResult'=>new JsExpression("function (pemohon){ return pemohon.text; }")
        ]
    ]) ?>

    <?= $form->field($model, 'id_hibah')->widget(Select2::class,[
        'initValueText'=>$nm_hibah,
        'options'=>[
            'placeholder'=>'Pilih Hibah...'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
            'minimumInputLength'=>3,
            'language'=>[
                'errorLoading'=>new JsExpression("function () {return 'Hadangi dulu...'}")
            ],
            'ajax'=>[
                'url'=>$url,
                'dataType'=>'json',
                'data'=>new JsExpression("function(params){ return {q:params.term}; }")
            ],
            'eascapeMarkup'=>new JsExpression("function (markup) { return markup; }"),
            'templateResult'=>new JsExpression("function(hibah) { return hibah.text; }"),
            'templateResult'=>new JsExpression("function (hibah){ return hibah.text; }")
        ]
    ]) ?>
      <?= $form->field($model, 'nm_tempat')->label('Tempat')->textInput(['maxlength' => true,
          'placeholder'=>'Contoh : Mesjid Al-Huda'
          ]) ?>

    <?= $form->field($model, 'nm_keg')->textInput(['maxlength' => true,
                  'placeholder'=>'Contoh : Renovasi atap dan tiang mesjid'
        ]) ?>


<?php
echo Html::label('Lokasi kegiatan, (Contoh :kantor pemerintah daerah, barabai)');
$center = new LatLng([

    'lat' => $lat, 'lng' => $lang]);

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
    'clientOptions' => ['draggable' => true], // draggable marker
                'clientEvents' => [
				'dragend'=>  new JsExpression('function(e){ 
					console.log(e.target.getLatLng()); 
					var LatLng = e.target.getLatLng();
					
					$("#datapemohonhibah-lat").val(LatLng.lat);
					$("#datapemohonhibah-lang").val(LatLng.lng);
				}'),
                    'click' => new JsExpression('function(e){ 
					var lat = e.latlng.lat;
					var lng = e.latlng.lng;
					console.log(e.latlng); 
					$("#datapemohonhibah-lat").val(lat);
					$("#datapemohonhibah-lang").val(lang);
					}')
                ]
]);

$leafLet = new LeafLet([
    'name' => 'geoMap',
  
    'tileLayer' => $tileLayer,
    'center' => $center,
    'zoom' => 20,
    'clientOptions' => ['draggable' => true], 
     'clientEvents' => [
         'click'=>'function(e){ var lat = e.latlng.lat;'
                . 'var lang = e.latlng.lng;'
                . '$("#datapemohonhibah-lat").val(lat);'
                . '$("#datapemohonhibah-lang").val(lang); }',
//        'click'=>new JsExpression('function(e){ var lat = e.target._lastCenter.lat;'
//                . 'var lang = e.target._lastCenter.lng;'
//                . '$("#datapemohonhibah-lat").val(lat);'
//                . '$("#datapemohonhibah-lang").val(lang); }'),
        // setting up one of the geo search events for fun
        'geosearch_showlocation' => 'function(e){


  console.log(e.target); 
        }',
        
        
    ]
]);
// add the marker
$leafLet->addLayer($marker);
// add the plugin
$leafLet->installPlugin($geoSearchPlugin);

// run the widget (you can also use dosamigos\leaflet\widgets\Map::widget([...]))
echo $leafLet->widget([
            'height'=>'500px',

]);
?>
     <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'lat')->label('Lat')->textInput(['readonly'=>true]) ?>
     
        </div>
                <div class="col-md-6">
    <?= $form->field($model, 'lang')->label('Lng')->textInput(['readonly'=>true])  ?>
            
        </div>
    </div>
      <?= $form->field($model, 'lokasi')->label('Lokasi Detail')->textInput(['maxlength' => true,
                    'placeholder'=>'Contoh : Jalan Permai, Gang IIX, No 5 '
          ]) ?>
       <?= $form->field($model, 'no_telp')->label('No Telp / WA (Aktif)')->textInput() ?>
       <?= $form->field($model, 'pagu_permintaan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
