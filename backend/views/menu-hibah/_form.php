<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RefUser;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\MenuHibah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-hibah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_menu')->label(false)->hiddenInput() ?>
    <?= $form->field($model,'kd_user')->label('Kelompok User')->widget(Select2::class,[
        'data'=> \yii\helpers\ArrayHelper::map(\backend\models\RefUser::find()->asArray()->all(), 'kd_user', 'nm_user'),
        'options'=>[
            'placeholder'=>'Pilih Kelompok user terlebih dulu'
        ]
    ]) ?>
    <?= $form->field($model,'nourut')->label('No Urut Menu')->textInput() ?>
    <?= $form->field($model,'label')->label('Nama Menu')->textInput() ?>
    <?= $form->field($model,'icon')->label('Icon Menu')->textInput() ?>
    <?= $form->field($model,'url')->label('Alamat web')->textInput() ?>
    <?= $form->field($model,'items')->label('Pas ja')->dropDownList([
        'Y'=>'Sub Menu Lv.1',
        'N'=>'Ga ada, males'
    ]) ?>
    <?= $form->field($model,'visible')->label('Ok ja dah')->dropDownList([
        'Y'=>'Aktifkan',
        'N'=>'No Aktif'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
