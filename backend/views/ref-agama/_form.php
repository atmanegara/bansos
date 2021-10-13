<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-agama-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Non Aktif', ], ['prompt' => '--Pilih status--']) ?>

   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
