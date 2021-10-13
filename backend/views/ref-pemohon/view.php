<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefPemohon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-pemohon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('List Data Permohonan Hibah', ['/data-pemohon-hibah/index','id_ref_pemohon'=>$model->id], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tahun',
            'nik',
            'nama',
            'id_ref_jkel',
            'tmp_lahir',
            'tgl_lahir',
            'alamat',
            'rt',
            'rw',
            'desa',
            'id_ref_kec',
            'id_ref_agama',
            'id_ref_status_kawin',
            'id_ref_pekerjaan',
            'id_ref_warga',
            'aktif',
            'date_create',
        ],
    ]) ?>

</div>
