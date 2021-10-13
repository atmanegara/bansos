<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefProv */

$this->title = false;
$this->params['breadcrumbs'][] = ['label' => 'Ref Provs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-prov-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
