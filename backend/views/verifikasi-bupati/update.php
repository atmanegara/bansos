<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBupati */

$this->title = 'Update Verifikasi Bupati: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Bupatis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verifikasi-bupati-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
