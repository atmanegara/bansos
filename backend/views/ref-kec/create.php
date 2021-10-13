<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefKec */

$this->title = 'Create Ref Kec';
$this->params['breadcrumbs'][] = ['label' => 'Ref Kecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
