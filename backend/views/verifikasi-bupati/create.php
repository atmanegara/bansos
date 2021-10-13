<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBupati */

$this->title = 'Create Verifikasi Bupati';
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Bupatis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-bupati-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
