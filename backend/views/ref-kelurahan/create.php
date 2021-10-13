<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKelurahan */

$this->title = 'Create Ref Kelurahan';
$this->params['breadcrumbs'][] = ['label' => 'Ref Kelurahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kelurahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
