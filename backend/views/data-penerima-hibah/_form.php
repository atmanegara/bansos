<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\VerifikasiTapd;
use backend\models\DataPemohonHibah;
use yii\helpers\Url;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model backend\models\DataPenerimaHibah */
/* @var $form yii\widgets\ActiveForm */ 
$data_pemohon_hibah = $model->isNewRecord ? '' : DataPemohonHibah::findOne($model->id_data_pemohon_hibah)->id_ref_pemohon;
$urlpemohonTapd = Url::to(['/verifikasi-tapd/pemohon-list']);
?>

<div class="data-penerima-hibah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_data_pemohon_hibah')->label('Nama Pemohon')->widget(Select2::class, [
        'initValueText'=>$data_pemohon_hibah,
          'options'=>[
            'placeholder'=>'Pilih Pemohon...'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
            'minimumInputLength'=>3,
            'language'=>[
                'errorLoading'=>new JsExpression("function () {return 'Parai...'}")
            ],
            'ajax'=>[
                'url'=>$urlpemohonTapd,
                'dataType'=>'json',
                'data'=>new JsExpression("function(params){ return {q:params.term}; }")
            ],
            'eascapeMarkup'=>new JsExpression("function (markup) { return markup; }"),
            'templateResult'=>new JsExpression("function(pemohon) { return pemohon.text; }"),
            'templateResult'=>new JsExpression("function (pemohon){ return pemohon.text; }")
        ]
    ]) ?>

     <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setuju')->dropDownList([
        '1'=>'Di terima',
        '2'=>'Tunda',
        '3'=>'Batal / Tolak'
    ],['prompt'=>'Pilih Status Persetujuan..']) ?>

    <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
