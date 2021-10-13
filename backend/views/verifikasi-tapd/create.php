<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiTapd */

$this->title = 'Create Verifikasi Tapd';
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Tapds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-tapd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
