<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohonHibah */

$this->title = 'Create Data Pemohon Hibah';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pemohon-hibah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'lat'=>$lat,
            'lang'=>$lang
    ]) ?>

</div>
