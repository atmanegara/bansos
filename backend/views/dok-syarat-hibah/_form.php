<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\DokSyaratHibah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dok-syarat-hibah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref_hibah')->widget(Select2::class,[
        'initValueText'=>$model->refHibah->nm_hibah,
        
    ]) ?>

    <?= $form->field($model, 'nm_dok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filedok')->label('Contoh Dokumen')->widget(FileInput::class,[
        'options'=>[
            'multiple'=>false,
    //        'accept'=>'pdf,doc,docx,xls,xlsx',
            
        ],
        'pluginOptions'=>[
  
            'showPreview'=>true,
            'showCaption'=>true,
            'showRemove'=>true,
            'showUpload'=>false,
        ]
    ])?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
