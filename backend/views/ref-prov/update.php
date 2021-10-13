<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefProv */

$this->title = false;
$this->params['breadcrumbs'][] = ['label' => 'Ref Provs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-prov-update">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
