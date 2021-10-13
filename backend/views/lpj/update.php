<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Lpj */

$this->title = 'Update Lpj: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lpjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lpj-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
