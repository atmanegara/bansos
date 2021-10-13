<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKelurahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kelurahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_prov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_kab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_keldes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmkeldes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
