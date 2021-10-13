<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RefSkpd;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\RefHibah */
/* @var $form yii\widgets\ActiveForm */

$dataSkpd = yii\helpers\ArrayHelper::map(RefSkpd::find()->asArray()->all(),'id','nm_skpd');
?>

<div class="ref-hibah-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_ref_skpd')->textInput()->widget(Select2::class, [
        'data'=>$dataSkpd,
        'options'=>[
            'placeholder'=>'--Pilih SKPD--',
        ],
        'pluginOptions'=>[
            'allowClose'=>true
        ]
    ]) ?>
    <?= $form->field($model, 'nm_hibah')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Aktif', 'N' => 'Non Aktif', ], ['prompt' => '']) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
