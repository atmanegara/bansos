<?php

namespace backend\controllers;

use Yii;
use backend\models\DataPemohonHibah;
use backend\models\DataPemohonHibahSearch;
use backend\models\DokPemohonHibah;
use backend\models\DokPemohonHibahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataPemohonHibahController implements the CRUD actions for DataPemohonHibah model.
 */
class DataPemohonHibahController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all DataPemohonHibah models.
     * @return mixed
     */
    public function actionIndex($id_ref_pemohon=null)
    {
        $id_ref_pemohon = Yii::$app->request->get('id_ref_pemohon');
        $searchModel = new DataPemohonHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(!is_null($id_ref_pemohon)){
        $dataProvider->query->where(['id_ref_pemohon'=>$id_ref_pemohon]);
            
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPemohonHibah model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Dok Pemohon Hibah
          $searchModel = new DokPemohonHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (!is_null($id)) {
            $dataProvider->query->where(['id_data_pemohon_hibah' => $id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new DataPemohonHibah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_ref_pemohon=Null)
    {
        
        $model = new DataPemohonHibah();
        $lat='-2.5842096139987216';
        $lang='115.38463036642007';
        $model->id_ref_pemohon = $id_ref_pemohon;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'lat'=>$lat,
            'lang'=>$lang
        ]);
    }

    /**
     * Updates an existing DataPemohonHibah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $lat=$model->lat;
        $lang=$model->lang;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model, 'lat'=>$lat,
            'lang'=>$lang
        ]);
    }

    /**
     * Deletes an existing DataPemohonHibah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
  public function actionDeleteById($id) {
        $model = DokPemohonHibah::find()->where(['id' => $id])->one();
        $id_data_pemohon_hibah = $model['id_data_pemohon_hibah'];
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
 
        return $this->redirect(['view','id'=>$id_data_pemohon_hibah]);
    }
    
    /**
     * Finds the DataPemohonHibah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataPemohonHibah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataPemohonHibah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    //Dok Pemohon Hibah
    
    public function actionIndexDokPemohonHibah()
    {
          $searchModel = new DokPemohonHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (!is_null($id)) {
            $dataProvider->query->where(['id_data_pemohon_hibah' => $id]);
        }
        return $this->render('index-dok-pemohon-hibah', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
}
