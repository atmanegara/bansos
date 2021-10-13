<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\DataPemohonHibah;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiTapd */
/* @var $form yii\widgets\ActiveForm */
$datapemohonhibah = $model->isNewRecord ? " " : DataPemohonHibah::getDataPemohonById($model->id_data_pemohon_hibah);
?>

<div class="verifikasi-tapd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_data_pemohon_hibah')->widget(Select2::class,[
        'initTextValue'=>$datapemohonhibah['nama'],
        'options'=>[
            'placeholder'=>'Pilih Pemohon ...'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
            'minimumInputLength'=>3,
            'language'=>[
                'errorLoading'=>New JsExpression("function(){retuurnn 'Parai...'}")
            ],
            'ajax'=>[
                'url'=>$dataPemohon
            ]
        ]
    ]) ?>

    <?= $form->field($model, 'status_verifikasi')->textInput() ?>

    <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pagu_usulan')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
