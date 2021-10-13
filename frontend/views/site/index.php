<?php
use yii\widgets\LinkPager;
use yii\bootstrap\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
   
        <p class="lead"><?=Html::textInput('carikata', null, ['class'=>'form-control','id'=>'carikata']) ?></p>
        <p><small><i>*) Tekan Enter untuk melakukan pencarian</i></small></p>
   </div>

    <div class="body-content">

        <div class="row">
          <?php foreach ($hibah as $value) { ?>
                
         
            <div class="col-lg-4">
               <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p><?=$value['nm_hibah'] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
            </div>
         <?php    } ?>
        </div>
  <?php echo LinkPager::widget([
            'pagination' => $pages,
            ]) ?>
    </div>
</div>
<script type="text/javascript"> 
 
$("#carikata").keyup(function(e){
  if(e.which != 13){
      return false;
  };
})        
  

</script>