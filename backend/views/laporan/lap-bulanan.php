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
                <div class="col-md-2">
<?php
echo Html::label('Bulan', 'id-bulan');
echo Html::dropDownList('bulan', null, [
    1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','Seprtember','Oktober','November','Desember'
],[
    'class'=>'form-control',
    'id'=>'id-bulan',
    'prompt'=>"Pilih Bulan..."
]) ?>                                        
                </div>
                <div class="col-md-2">
<?php
echo Html::label('Tahun', 'id-tahun');
echo Html::dropDownList('Tahun',date('Y'), [
    2017=>'2017',
    2018=>'2018',
    2019=>'2019',
    2020=>'2020',
    2021=>'2012'
],[
    'class'=>'form-control',
    'id'=>'id-tahun',
]) ?>                                        
                </div>

                  <div class="col-md-4">
<?php
echo Html::label('[aksi]', 'id-cari');
echo Html::button('Cari',[
    'id'=>'id-cari',
    'class'=>'form-control btn btn-warning',
    'onClick'=>'alert("OK")'
]) ?>                                        
                </div>     

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-6">
<div class="panel panel-primary">
    <div class="panel-heading">
        <label class="panel-title">Laporan LPJ Bulanan</label>
    </div>
    <div class="panel-body">
        <div id="tabel-bulanan"></div>
    </div>
</div>        
    </div>
</div>


