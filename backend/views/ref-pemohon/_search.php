<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefPemohonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-pemohon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'id_ref_jkel') ?>

    <?php // echo $form->field($model, 'tmp_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'desa') ?>

    <?php // echo $form->field($model, 'id_ref_kec') ?>

    <?php // echo $form->field($model, 'id_ref_agama') ?>

    <?php // echo $form->field($model, 'id_ref_status_kawin') ?>

    <?php // echo $form->field($model, 'id_ref_pekerjaan') ?>

    <?php // echo $form->field($model, 'id_ref_warga') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
