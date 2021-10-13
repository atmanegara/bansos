<?php

use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Html;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use kartik\dialog\Dialog;
$id_data_pemohon = Yii::$app->request->get('id');
?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <label class="panel-title">
            Dokumen Persyaratan : <?= $nmHibah ?> 
        </label>
    </div>
    <div class="panel-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderDokSyarat,
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn'
                ],
                'nm_dok',
                [
                    'header' => 'Upload File',
                    'format' => 'raw',
                    'value' => function($data, $url)use($no_registrasi, $id_data_pemohon) {
            $id = $data['id'];
                        return FileInput::widget([
                                    'name' => 'filedoc' . $data['id'],
                                    'pluginOptions' => [
                                        'showPreview' => false,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => true,
                                        'uploadUrl' => Url::to(['file-upload', 'id_data_pemohon_hibah' => $id_data_pemohon, 'id' => $data['id'], 'name' => 'filedoc' . $data['id'], 'no_registrasi' => $no_registrasi]),
                                  //      'deleteUrl' =>Url::to(['delete-by-id', 'id_data_pemohon_hibah' => $id_data_pemohon, 'id' => $data['id'], 'name' => 'filedoc' . $data['id'], 'no_registrasi' => $no_registrasi])
                                        ],
                                                       'pluginEvents' => [
                                        'fileclear' => "
                                            function(event,index) {
hapusfile($id)
}",
                                    ]
                        ]);
                    }
                ],
                    
            ]
        ])
        ?>
    </div>
    <div class="panel-footer">
        <?=
        CheckboxX::widget([
            'name' => 's_7',
            'options' => ['id' => 's_7', 'onClick' => 'pernytaan(this.value)'],
            'pluginOptions' => [ 'threeState' => false,'enclosedLabel' => true,],
          'initInputType' => CheckboxX::INPUT_CHECKBOX,
            'autoLabel' => true,
            'labelSettings' => [
                'label' => 'Right Label',
                'label' => 'Saya menyatakan bahwa dokumen yang di unduh adalah asli dari hasil scan dokumen asli, siap dipertanggung jawabkan jika terjadi dinyatakan palsu',
                'position' => CheckboxX::LABEL_RIGHT
            ]
        ]);
        ?>
        <div style="display: none" id='butoncetak'>
            <?=
            yii\bootstrap\Html::button('Ajukan Permohonan', [
                'onClick' => 'simpanpernyataan()',
                'class' => 'btn btn-primary'])
            ?>

        </div>
    </div>
</div>
<?php
echo Dialog::widget([
     'libName' => 'krajeeDialog',
     'options' => [], // default options
  ]);
?>
<script>
    function pernytaan(nilai)
    {
    //    console.log(nilai);
       if(nilai=='0'){
           $("#butoncetak").css("display","block");
       }else{
                  $("#butoncetak").css("display","none");
    
       }
    }
    function simpanpernyataan()
    {
        var pilih = $("#s_7").val();
        var no_registrasi = "<?=$no_registrasi ?>";
        var posting = $.post("<?= Url::to(['simpan-pernyataan']) ?>",{
            pilih : pilih,
            no_registrasi : no_registrasi
        })
        posting.done(function(){
            console.log('done')
        });
        posting.always(function(data){
            var data = JSON.parse(data);
      //      $.notify(data.growlOptions,data.growlSettings);
      krajeeDialog.alert('OK, pengajuan hibah berhasil di kirim')
        })
    }
    
    function hapusfile(id){
        
        var posting = $.get("<?= Url::to(['delete-by-id']) ?>",{
    id : id    
    });
    posting.done(function(){
        console.log('done');
    })
    posting.always(function(){
      krajeeDialog.alert('OK, pengajuan hibah berhasil di hhapus')
        
    })
    }
    </script>