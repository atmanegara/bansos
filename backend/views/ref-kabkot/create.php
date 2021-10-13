<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKabkot */

$this->title = 'Create Ref Kabkot';
$this->params['breadcrumbs'][] = ['label' => 'Ref Kabkots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kabkot-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
