<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJkel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-jkel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jkel')->label('Jenis Kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Non Aktif', ], ['prompt' => '--Pilih Status--']) ?>

  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
