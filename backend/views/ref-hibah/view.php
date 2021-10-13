<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\models\RefHibah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Hibahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-hibah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>     <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-default']) ?>
    
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
             <?= Html::a('Tambah Dok Persyaratan', ['/dok-syarat-hibah/create', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          [
              'label'=>'SKPD',
              'value'=>function($model){
        return $model->refSkpd->nm_skpd;
              }
          ],
        //     'id',
            'nm_hibah',
//             'aktif',
  //          'create_date',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider'=>$dataProviderDokSyarat,
        'columns'=>[
            [
              'class'=> 'kartik\grid\SerialColumn'  
            ],
        'nm_dok:text:Syarat',
        [
            'class'=> 'kartik\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
                'view'=>function($url,$data){
                    $url= Url::to(['/dok-syarat-hibah/tampil-dok','id'=>$data['id']]);
                         return yii\bootstrap\Html::button('Tampil Dokumen',[
                'title'=>'Tampil Dokumen Persyaratan',
                   'value'=> $url,
                 'class'=>'btn btn-info showModalButton'
            ]);
                },
                        'update'=>function($url,$data){
                    $url = Url::to(['/dok-syarat-hibah/update','id'=>$data['id']]);
                    return Html::a('Ubah', $url,['class'=>'btn btn-warning']);
                        }
            ]
        ]
            ]
    ])
                  ?>
</div>
<?php
Modal::begin([
'headerOptions' => ['id' => 'modalHeader'],
'id' => 'modal',
'size' => 'modal-lg',
    'options'=>[
        'style'=>['padding-top'=>'70px']
    ],
//'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>