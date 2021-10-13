<?php

namespace backend\controllers;

use Yii;
use backend\models\DokPemohonHibah;
use backend\models\DokPemohonHibahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\UploadedFile;
/**
 * DokPemohonHibahController implements the CRUD actions for DokPemohonHibah model.
 */
class DokPemohonHibahController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DokPemohonHibah models.
     * @return mixed
     */
    public function actionIndex($id = null) {
        $searchModel = new DokPemohonHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (!is_null($id)) {
            $dataProvider->query->where(['id_data_pemohon_hibah' => $id]);
        }
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DokPemohonHibah model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DokPemohonHibah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null) {
        $model = new DokPemohonHibah();
        $model->id_data_pemohon_hibah = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $modelDataPemohonHibah = (new Query())
                        ->select(' a.nik,a.nama,b.no_telp,b.nm_keg,b.lat,b.lang,b.pagu_permintaan,b.id_hibah,b.no_registrasi')
                        ->from('ref_pemohon a')
                        ->innerJoin('data_pemohon_hibah b', 'a.id=b.id_ref_pemohon')
                        ->where(['b.id' => $id])->one();
        $nmHibah = \backend\models\RefHibah::findOne($modelDataPemohonHibah['id_hibah'])->nm_hibah;
        
        $dataDokSyarat = \backend\models\DokSyaratHibah::find()->where(['id_ref_hibah'=>$modelDataPemohonHibah['id_hibah'],'aktif'=>'Y']);
        $dataProviderDokSyarat = new \yii\data\ActiveDataProvider([
            'query'=>$dataDokSyarat,
            
        ]);
        return $this->render('create', [
                    'model' => $model,
                    'modelDataPemohonHibah' => $modelDataPemohonHibah,
                    'nmHibah'=>$nmHibah,
            'dataProviderDokSyarat'=>$dataProviderDokSyarat,
            'no_registrasi'=>$modelDataPemohonHibah['no_registrasi']
        ]);
    }

    /**
     * Updates an existing DokPemohonHibah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DokPemohonHibah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
  $model = DokPemohonHibah::find()->where(['id' => $id])->all();
        foreach ($model as $value) {
            //  return var_dump($value['path_gambar']);
            $path_file = './uploads/' . $value['nama_file'];
            if(file_exists($path_file)){
    //        return var_dump($path_file);
            chmod($path_file, 0777);
            unlink($path_file);
            }
        }
               $this->findModel($id)->delete();
 
        return $this->redirect(['index']);
    }

    /**
     * Finds the DokPemohonHibah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DokPemohonHibah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DokPemohonHibah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionFileUpload() {
        if (Yii::$app->request->get()) {
            $id_data_pemohon_hibah = Yii::$app->request->get('id_data_pemohon_hibah');
            $filedok = Yii::$app->request->get('name');
            $id = Yii::$app->request->get('id');
            $no_registrasi = Yii::$app->request->get('no_registrasi');

            $model = new DokPemohonHibah();
            $model->id_data_pemohon_hibah = $id_data_pemohon_hibah;
            $model->no_registrasi = $no_registrasi;
            $model->id_dok_syarat_hibah = $id;

            $model->filedoc = UploadedFile::getInstanceByName($filedok);
            $filename = $model->filedoc->baseName . '.' . $model->filedoc->extension;
            $model->nama_file = $filename;
            $model->tgl_upload = date('Y-m-d');
            if ($model->filedoc->saveAs('./uploads/' . $filename)) {
                $model->save(false);
            }

            return Json::encode(['msg' => 'Sukses']);
        }
    }
        public function actionDeleteById($id) {
        $model = DokPemohonHibah::find()->where(['id' => $id])->one();
     //  foreach ($model as $value) {
            //  return var_dump($value['path_gambar']);
           $path_file = './uploads/' . $model['nama_file'];
              if(file_exists($path_file)){
                   //        return var_dump($path_file);
            chmod($path_file, 0777);
            unlink($path_file);
 
    //      }
        }
            $this->findModel($id)->delete();
 
        return \yii\helpers\Json::encode(['msg' => 'Sukses']);
    }
    
    public function actionSimpanPernyataan(){
        
        $pilih = Yii::$app->request->post('pilih');
        $no_registrasi = Yii::$app->request->post('no_registrasi');
        
        $sql= "insert into data_pernyataan(setuju,no_registrasi)value(:pilih,:no_registrasi)";
        $params=[
            ':pilih'=>$pilih,
            ':no_registrasi'=>$no_registrasi
        ];
        Yii::$app->db->createCommand($sql, $params)->execute();
        return Json::encode(['msg'=>'Sukses']);
    }
  public function actionTampilDok($id) {
        $file_dok = DokPemohonHibah::find()->where(['id' => $id])->one();
        return $this->renderAjax('tampil-dok', [
                    'file_dok' => $file_dok
        ]);
    }
}
