<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
