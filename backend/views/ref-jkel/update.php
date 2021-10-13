<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJkel */

$this->title = 'Update Ref Jkel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jkels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-jkel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
