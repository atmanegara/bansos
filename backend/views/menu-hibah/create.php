<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MenuHibah */

$this->title = 'Create Menu Hibah';
$this->params['breadcrumbs'][] = ['label' => 'Menu Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-hibah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
