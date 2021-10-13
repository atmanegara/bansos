<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBupati */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifikasi-bupati-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_data_pemohon_hibah')->textInput() ?>

    <?= $form->field($model, 'status_verifikasi')->textInput() ?>

    <?= $form->field($model, 'catatan')->textInput() ?>

    <?= $form->field($model, 'pagu_usulan')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
