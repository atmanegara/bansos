<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LpjSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lpj-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_hibah') ?>

    <?= $form->field($model, 'id_data_pemohon_hibah') ?>

    <?= $form->field($model, 'nm_barang') ?>

    <?= $form->field($model, 'harga_barang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
