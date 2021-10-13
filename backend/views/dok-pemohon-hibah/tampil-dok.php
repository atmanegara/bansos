<?= \yii2assets\pdfjs\PdfJs::widget([
    'options'=>[
      'data'=>[
          'idnya'=>$file_dok['id']
      ],  
    ],
    'id'=>'pdfid',
  'width'=>'100%',
  'height'=> '500px',
  'url'=>Yii::getAlias('@web'). '/uploads/'.$file_dok['nama_file'],
   
]);
?>
