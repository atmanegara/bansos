<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokPemohonHibah */

$this->title = 'Update Dok Pemohon Hibah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dok Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dok-pemohon-hibah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
