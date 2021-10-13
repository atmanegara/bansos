<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohonHibah */

$this->title = 'Update Data Pemohon Hibah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-pemohon-hibah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lat'=>$lat,
            'lang'=>$lang
    ]) ?>

</div>
