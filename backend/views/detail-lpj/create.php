<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailLpj */

$this->title = 'Create Detail Lpj';
$this->params['breadcrumbs'][] = ['label' => 'Detail Lpjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-lpj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
