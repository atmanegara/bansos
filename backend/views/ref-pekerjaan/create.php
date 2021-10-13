<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefPekerjaan */

$this->title = 'Create Ref Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Ref Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-pekerjaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
