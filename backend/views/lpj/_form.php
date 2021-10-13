<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use backend\models\RefHibah;
use backend\models\DataPemohonHibah;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\JsExpression;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model backend\models\Lpj */
/* @var $form yii\widgets\ActiveForm */
$dataHibah = ArrayHelper::map(RefHibah::find()->asArray()->all(), 'id', 'nm_hibah');
$dataPemohonHibah = !is_null($model->id_data_pemohon_hibah) ? backend\models\DataPemohonHibah::findOne($model->id_data_pemohon_hibah)->nama : "";
$urldatapemohon = Url::to(['/verifikasi-tapd/pemohon-list']);
?>

<div class="lpj-form">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input Lap. Lpj
        </div>
        <div class="panel-body">
            <?php
            $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data'],
                        'id' => 'form-lpj',
                        'action' => Url::to(['simpan-img'])
            ]);
            ?>

            <?=
            $form->field($model, 'id_hibah')->label('Jenis Hibah')->widget(Select2::class, [
                'initValueText' => RefHibah::findOne($model->id_hibah)->nm_hibah,
                'data' => $dataHibah,
                'options' => [
                    'placeholder' => "Pilih Jenis Hibah.."
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ])
            ?>

            <?=
            $form->field($model, 'id_data_pemohon_hibah')->label('Pemohon')->widget(Select2::class, [
                'initValueText' => $dataPemohonHibah,
                'options' => [
                    'placeholder' => 'Pilih Pemohon..'
                ],
                'pluginOptions' => [
                    'allowClose' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function(){return 'parai..'}")
                    ],
                    'ajax' => [
                        'url' => $urldatapemohon,
                        'dataType' => 'json',
                        'data' => new JsExpression("function(params){ return {q:params.term};}")
                    ],
                    'eascapeMarkup' => new JsExpression("function(markup){return markup;}"),
                    'templateResult' => new JsExpression("function(pemohon){return pemohon.text;}"),
                    'templateResult' => new JsExpression("function(pemohon){return pemohon.text;}")
                ]
            ])
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-danger">

                        <div class="panel-body">
                            <table class='table'>
                                <tr><td>Item</td><td>Pengeluaran</td><td>Aksi</td></tr>
                                <tr>
                                    <td>
                                        <?= $form->field($model, 'nm_barang')->label(false)->textInput(['maxlength' => true]) ?>
                                    </td>
                                    <td>
<?= $form->field($model, 'harga_barang')->label(false)->textInput(['maxlength' => true]) ?>

                                    </td>
                                    <td>
                                        <?=
                                        \yii\bootstrap\Html::button('Tambah', ['class' => 'btn btn-primary',
                                            'onClick' => 'insert()'
                                        ])
                                        ?>     
                                    </td>
                                </tr>
                            </table>
                            <div onload="tampil();" id="tablenya" class="table-responsive">

                            </div>

                        </div>
                        <div class="panel-footer">
                            <?=
                            \yii\bootstrap\Html::button('Hapus Semua', ['class' => 'btn btn-danger',
                                'onClick' => 'hapusall()'
                            ])
                            ?>
                        </div>
                    </div>    
                </div>

            </div>
            <?= $form->field($model, 'imageFiles[]')->widget(FileInput::class,[
                'options'=>[
                    'multiple'=>true,
                ],
                'pluginOptions'=>[
                    'previewFileType' => 'any',
                    'showUpload'=>false,
                     'uploadUrl' => false,
                ]
            ])
            ?>
            <div class="form-group">
                <?=
                yii\bootstrap\Html::button('Simpan', [
                    'class' => 'btn btn-primary',
                    'onClick' => 'simpan()'
                ])
                ?>
               
            </div>
<?php ActiveForm::end(); ?> 
        </div>

        <div class="panel-footer">

        </div>
    </div>


</div>
<?php
echo Dialog::widget([
     'libName' => 'krajeeDialogCust',
     'options' => ['draggable' => true, 'closable' => true,'type'=> Dialog::TYPE_SUCCESS], // custom options
  ]);
?>
<script type="text/javascript">



    function insert() {
        var nm_barang = $("#lpj-nm_barang").val();
        var harga_barang = $("#lpj-harga_barang").val();
        const item = {
            nama: nm_barang,
            harga: harga_barang,
        }

        window.localStorage.setItem(new Date().getTime(), JSON.stringify(item));
        tampil();
    }
    function hapus(keyitem)
    {
        window.localStorage.removeItem(keyitem)
        tampil();
    }
    function hapusall() {
        window.localStorage.clear()
        tampil();
    }
    function tampil()
    {
        var keys = Object.keys(localStorage).sort();
        var awal = "<table class='table table-bordered'>";
        var title = "<tr><td>Nama Item</td><td>Jumlah Pengeluaran</td><td>Aksi</td></tr>"
        var isi = "";
        for (var i = 0; i < window.localStorage.length; i++) {

            var keyitem = keys[i];
             console.log(window.localStorage.getItem(keyitem));
            var items = JSON.parse(window.localStorage.getItem(keyitem));
            if (items == null) {
                console.log(i);
                continue;
            }
//  console.log(items['location']);
            var nama = items['nama'];
            var harga = items['harga'];
            isi += "<tr><td width='41%'>" + nama + "</td><td width='41%'>" + harga + "</td><td><button class='btn btn-warning' onClick='hapus(" + keyitem + ")'>Hapus</button></td></tr>"
        }
        ;
        var tutup = "</table>";

        var tabel = awal + title + isi + tutup;
        $("#tablenya").html(tabel);
    }

</script>
<script type="text/javascript">

    function simpan() {

        var keys = Object.keys(localStorage).sort();
        var id_hibah = $("#lpj-id_hibah").val();
 
        var id_data_pemohon_hibah = $("#lpj-id_data_pemohon_hibah").val();

        for (var i = 0; i < window.localStorage.length; i++) {

            var keyitem = keys[i];
            var items = JSON.parse(window.localStorage.getItem(keyitem));

            var nama = items['nama'];
            var harga = items['harga'];

            var posting = $.post("<?= Url::to(['simpan-lpj']) ?>", {
                id_hibah: id_hibah,
                id_data_pemohon_hibah: id_data_pemohon_hibah,
                nm_barang: nama,
                harga_barang: harga
            })
            posting.done(function () {
                console.log('selesai');
            })
            posting.always(function () {
                console.log('Pas dah OK');
            })
        }
       simpanDetail();
        hapusall();
    }
    function simpanDetail() {
        //   var form = document.getElementById('form-lpj');
        var formData = new FormData($("#form-lpj")[0]);
        //console.log(formData);
        //  formData.append('imageFiles[]', $("#lpj-imagefiles")[0].files[0]);
        var ins = document.getElementById('lpj-imagefiles').files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("imageFiles[]", document.getElementById('lpj-imagefiles').files[x]);
        }


        var formURL = $("#form-lpj").attr("action");
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data, textStatus, jqXHR)
                    {
                        krajeeDialogCust.alert('sukses');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert("gagal");
                        return false;
                    }
                });
    }

    function hapusall()
    {
        window.localStorage.clear()
        tampil();
    }
</script>