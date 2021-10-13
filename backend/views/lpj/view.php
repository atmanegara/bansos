<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Lpj */

$this->title ='Tampil';

?>
<div class="lpj-view">

<?= 
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> 'kartik\grid\SerialColumn'
        ],
        [
            'class'=> '\kartik\grid\ExpandRowColumn',
            'value'=>function($model,$key,$index){
                return GridView::ROW_COLLAPSED;
            },
                    'detailUrl'=>Url::to(['view-detail-lpj'])
        ],
                    'nm_tempat:text:Tempat',
                    'nm_keg:text:Kegiatan',
                    'lokasi:text:Lokasi',
                    'pagu_usulan:text:Pagu',
                    [
                        'class'=> '\kartik\grid\ActionColumn',
                        'template'=>'{lokasi}',
                        'buttons'=>[
                            'lokasi'=>function($url,$data){
                                return $url;
                            }
                        ]
                    ]
    ]
])
?>

</div>
