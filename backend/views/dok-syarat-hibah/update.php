<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokSyaratHibah */

$this->title = 'Update Dok Syarat Hibah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dok Syarat Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dok-syarat-hibah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
          'initialPreview'=>$initialPreview,
          'initialPreviewConfig'=>$initialPreviewConfig
    ]) ?>

</div>
