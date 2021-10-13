<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohonHibahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pemohon-hibah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_ref_pemohon') ?>

    <?= $form->field($model, 'id_hibah') ?>

    <?= $form->field($model, 'nm_keg') ?>

    <?= $form->field($model, 'lokasi') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
