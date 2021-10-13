<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefHibah */

$this->title = 'Create Ref Hibah';
$this->params['breadcrumbs'][] = ['label' => 'Ref Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-hibah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
