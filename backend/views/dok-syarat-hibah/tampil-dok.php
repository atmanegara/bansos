<?= \yii2assets\pdfjs\PdfJs::widget([
  'width'=>'100%',
  'height'=> '500px',
  'url'=> './uploads/'.$file_dok['nm_file'],
   
]);
?>

<style>
    .modal-content {
  position: absolute;
    }
  </style>