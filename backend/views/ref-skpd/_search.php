<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_urusan') ?>

    <?= $form->field($model, 'kd_bidang') ?>

    <?= $form->field($model, 'kd_unit') ?>

    <?= $form->field($model, 'kd_sub') ?>

    <?php // echo $form->field($model, 'nm_skpd') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
