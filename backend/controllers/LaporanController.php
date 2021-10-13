<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\VerifikasiTapd;
use backend\models\RefPemohon;
use kartik\mpdf\Pdf;
use backend\models\RefHibah;
use backend\models\DataPemohonHibah;
use yii\data\ActiveDataProvider;
/**
 * Description of LaporanController
 *
 * @author Administrator
 */
class LaporanController extends Controller{
    //put your code here
    
    
    public function actionIndex()
    {
        $query = RefHibah::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$query
        ]);
        return $this->render('index',[
            'dataProvider'=>$dataProvider
        ]);
    }
    
    public function actionLapBulanan(){
        
        $bulan = Yii::$app->request->get('bulan');
        $tahun = Yii::$app->request->get('tahun');
         return $this->render('lap-bulanan',[
          
        ]);
    }

    public function actionCetakDataTapd()
    {
        $sql = "SELECT a.nm_tempat,a.nm_keg,a.lokasi,a.pagu_permintaan,c.pagu_usulan
 FROM data_pemohon_hibah a 
 INNER JOIN verifikasi_tapd c ON a.id=c.id_data_pemohon_hibah AND c.status_verifikasi=2
WHERE a.id NOT IN (SELECT b.id_data_pemohon_hibah FROM data_penerima_hibah b) ";
        $dataCalonHibah = Yii::$app->db->createCommand($sql)->queryAll();
        
        $content = $this->renderPartial('cetak-data-tapd',[
            'dataCalonPenerima'=>$dataCalonHibah
        ]);
          $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Krajee Report Header'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render();   
    }
     public function actionCetakDataTapdById()
    {
         $id_hibah = Yii::$app->request->get('id_hibah');
        $sql = "SELECT a.nm_tempat,a.nm_keg,a.lokasi,a.pagu_permintaan,c.pagu_usulan
 FROM data_pemohon_hibah a 
 INNER JOIN verifikasi_tapd c ON a.id=c.id_data_pemohon_hibah AND c.status_verifikasi=2
WHERE a.id NOT IN (SELECT b.id_data_pemohon_hibah FROM data_penerima_hibah b) and a.id_hibah=$id_hibah";
        $dataCalonHibah = Yii::$app->db->createCommand($sql)->queryAll();
        
        $content = $this->renderPartial('cetak-data-tapd',[
            'dataCalonPenerima'=>$dataCalonHibah
        ]);
          $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Krajee Report Header'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render();   
    }
}
