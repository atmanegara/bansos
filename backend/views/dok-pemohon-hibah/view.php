<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DokPemohonHibah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dok Pemohon Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dok-pemohon-hibah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_data_pemohon_hibah',
            'id_dok_syarat_hibah',
            'nama_file',
            'tgl_upload',
            'reupload',
            'catatan',
            'id_user',
            'create_date',
        ],
    ]) ?>

</div>
