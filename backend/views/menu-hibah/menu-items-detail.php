<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

?>
<div class="menu-hibah-items-index">

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
 
            'label',
            'icon',
            'url:url',
            //'items',
            //'visible',
            //'id_user',

        ],
    ]); ?>
</div>
