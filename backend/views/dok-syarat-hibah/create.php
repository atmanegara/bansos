<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DokSyaratHibah */

$this->title = 'Create Dok Syarat Hibah';
$this->params['breadcrumbs'][] = ['label' => 'Dok Syarat Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dok-syarat-hibah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
          'initialPreview'=>$initialPreview
    ]) ?>

</div>
