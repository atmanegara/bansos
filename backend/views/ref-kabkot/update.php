<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKabkot */

$this->title = 'Update Ref Kabkot: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Kabkots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-kabkot-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
