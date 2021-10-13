<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuHibahItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-hibah-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kd_menu') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'items') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
