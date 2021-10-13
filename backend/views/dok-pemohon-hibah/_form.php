<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\DokPemohonHibah */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="dok-pemohon-hibah-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if(!is_null($model->id_data_pemohon_hibah)){
        echo $this->render('list-data-pemohon-hibah',[
            'id'=>$model->id_data_pemohon_hibah,
            'modelDataPemohonHibah'=>$modelDataPemohonHibah
        ]);
    }
    ?>
 
                <?= $this->render('tabel-dok-syarat',[
 'nmHibah'=>$nmHibah,
            'dataProviderDokSyarat'=>$dataProviderDokSyarat,
                'no_registrasi'=>$no_registrasi
    ]) ?>


    <?= $form->field($model, 'id_data_pemohon_hibah')->label(false)->hiddenInput() ?>

  

   

    <?php ActiveForm::end(); ?>

</div>
