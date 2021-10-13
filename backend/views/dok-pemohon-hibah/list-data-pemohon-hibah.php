<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="dok-pemohon-hibah-view">
    <div class="panel panel-info">
        <div class="panel-heading">
            <label class="panel-title">Pemohon Hibah</label>
        </div>
        <div class="panel-body">
<?= DetailView::widget([
        'model' => $modelDataPemohonHibah,
        'attributes' => [
            'nik',
            'nama',
            'no_telp',
            'nm_keg',
           'pagu_permintaan',
            [
                'label'=>'Lokasi',
                'value'=>function($model){
                    return 'lat: '.$model['lat'] . ', lang : '.$model['lang'];
                }
            ]
        ],
    ]) ?>
            
        </div>
    </div> 

</div>
