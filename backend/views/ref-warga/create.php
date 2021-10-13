<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefWarga */

$this->title = 'Create Ref Warga';
$this->params['breadcrumbs'][] = ['label' => 'Ref Wargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-warga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
