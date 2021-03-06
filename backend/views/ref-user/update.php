<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefUser */

$this->title = 'Update Ref User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
