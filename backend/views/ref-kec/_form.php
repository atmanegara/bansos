<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-kec-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref_prov')->textInput() ?>

    <?= $form->field($model, 'id_ref_kabkot')->textInput() ?>

    <?= $form->field($model, 'nama_kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
