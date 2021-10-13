<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefPemohon */

$this->title = 'Create Ref Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'Ref Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-pemohon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
