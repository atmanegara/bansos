<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJkel */

$this->title = 'Create Ref Jkel';
$this->params['breadcrumbs'][] = ['label' => 'Ref Jkels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jkel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
