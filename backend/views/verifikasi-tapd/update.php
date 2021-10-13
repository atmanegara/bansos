<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiTapd */

$this->title = 'Update Verifikasi Tapd: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Tapds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verifikasi-tapd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
