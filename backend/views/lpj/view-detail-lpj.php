<?php
use yii\helpers\Url;
use kartik\grid\GridView;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        Data Pengeluaran
    </div>
    <div class="panel-body">
        <?=
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> 'kartik\grid\SerialColumn'
        ],
        'nm_barang:text:Nama Item',
        'harga_barang:decimal:harga_barang'
    ]
])
?>
    </div>
    <div class="panel-footer">
        <table class="table table-bordered">
            <tr>
        <?php foreach ($detaillpj as $value) { ?>
                <td><?= yii\helpers\Html::img(Url::to(['./uploads/'.$value['foto']]),[
                    'width'=>'30%',
                    'height'=>'30%'
                ]) ?></td>
  <?php  } ?>
            </tr>
        </table>
    </div>
</div>

