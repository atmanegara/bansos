<?php

use yii\bootstrap\Html;
use kartik\select2\Select2;
use backend\models\MenuHibah;
use yii\helpers\ArrayHelper;

$kd_user = Yii::$app->request->get('kd_user');
$dataMenuHeader = ArrayHelper::map( MenuHibah::find()->asArray()->all(), 'kd_menu','label');
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Form Permission
        <span class="pull-right">
           adasda
        </span>
    </div>
    <div class="panel-body">
        <?= Html::textInput('kd_user', $kd_user, [
            'class'=>'form-control',
        ]) ?>
        <?= Select2::widget([
            'name'=>'menu-header',
            'data'=>$dataMenuHeader,
            'options'=>[
                'placeholder'=>'Pilih Menu Header ....',
                'onChange'=>'menuitem(this.value)'
            ],
            'pluginOptions'=>[
                'allowClose'=>true
            ]
        ]) ?>
        <?= Select2::widget([
            'name'=>'menu-item',
            'id'=>'menu-item-id',
//            'data'=>$dataMenuHeader,
            'options'=>[
                'placeholder'=>'Pilih Menu Item ....',
                'onChange'=>'menuitem(this.value)'
            ],
            'pluginOptions'=>[
                'allowClose'=>true
            ]
        ]) ?>    
    <?= Html::dropDownList('Status', null,[
        'Y'=>"Aktif",
        'N'=>'Tidak Aktif'
    ],[
        'prompt'=>"Pilih Status ...",
        'class'=>'form-control'
    ]) ?>
    </div>
</div>
<script>
    function menuitem(kd_menu)
    {
        var kd_menu = kd_menu;
    var posting = $.post("<?= yii\helpers\Url::to(['/menu-hibah-items/get-menu-items']) ?>",{
        kd_menu : kd_menu
    })
    posting.always(function(html){
        $("#menu-item-id").html(html);
    })
    }
    </script>