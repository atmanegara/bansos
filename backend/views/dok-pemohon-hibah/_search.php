<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DokPemohonHibahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dok-pemohon-hibah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_data_pemohon_hibah') ?>

    <?= $form->field($model, 'id_dok_syarat_hibah') ?>

    <?= $form->field($model, 'nama_file') ?>

    <?= $form->field($model, 'tgl_upload') ?>

    <?php // echo $form->field($model, 'reupload') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
