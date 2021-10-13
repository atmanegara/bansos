<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\RefProv;
/* @var $this yii\web\View */
/* @var $model backend\models\RefKabkot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kabkot-form">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Ref Kabkota`
        </div>
        <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

 
    <?= $form->field($model, 'id_ref_prov')->label('Nama Provinsi')->widget(Select2::class,[
        'data'=> RefProv::getProvAllAktif(),
        'options'=>[
            'placeholder'=>"Pilih Provinsi"
        ],
        'pluginOptions'=>[
            'allowClose'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'nm_kabkot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Non Aktif', ], ['prompt' => 'Pilih Status']) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>            
        </div>
    </div>


</div>
