<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokPemohonHibah */

$this->title = 'Create Dok Pemohon Hibah';
$this->params['breadcrumbs'][] = ['label' => 'Dok Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dok-pemohon-hibah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDataPemohonHibah'=>$modelDataPemohonHibah,
        'nmHibah'=>$nmHibah,
            'dataProviderDokSyarat'=>$dataProviderDokSyarat,
        'no_registrasi'=>$no_registrasi
    ]) ?>

</div>
