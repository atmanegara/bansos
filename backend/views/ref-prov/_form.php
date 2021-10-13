<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefProv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-prov-form">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Ref Provinsi
        </div>
        <div class="panel-body">
              <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_prov')->label('Nama Provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Non Aktif', ], ['prompt' => 'Pilih Status...']) ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  
        </div>
    </div>

</div>
