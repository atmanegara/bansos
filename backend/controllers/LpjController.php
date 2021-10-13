<?php

namespace backend\controllers;

use Yii;
use backend\models\Lpj;
use backend\models\LpjSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\RefHibah;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * LpjController implements the CRUD actions for Lpj model.
 */
class LpjController extends Controller {

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
     * Lists all Lpj models.
     * @return mixed
     */
    public function actionIndexOld() {
        $searchModel = new LpjSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex() {
        $query = RefHibah::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Lpj model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $query = (new \yii\db\Query())
                ->select("b.id,b.nm_tempat,b.nm_keg,b.lokasi,d.pagu_usulan")
                ->from("data_pemohon_hibah b")
                ->innerJoin("ref_pemohon c","b.id_ref_pemohon=c.id")
                ->innerJoin("verifikasi_tapd d","d.id_data_pemohon_hibah=b.id")
                ->where("d.status_verifikasi=2");
        
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'key'=>'id'
        ]);
        
        return $this->render('view', [
            'dataProvider'=>$dataProvider
//                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lpj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $id_hibah = Yii::$app->request->get('id');
        $model = new Lpj();
        $model->id_hibah = $id_hibah;
        if ($model->load(Yii::$app->request->post())) {
// $model->imageFiles = UploadedFile::getInstances($model,'imageFiles');
// foreach ($model->imageFiles as $file) {
//            $filename =  $file->baseName . '.' . $file->extension;
//                $file->saveAs('./uploads/' .$filename,false);
// }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionSimpanLpj() {
        $id_hibah = Yii::$app->request->post('id_hibah');
        $id_data_pemohon_hibah = Yii::$app->request->post('id_data_pemohon_hibah');
        $nm_barang = Yii::$app->request->post('nm_barang');
        $harga_barang = Yii::$app->request->post('harga_barang');
        $imageFiles = Yii::$app->request->post('imageFiles');
        //      return var_dump($imageFiles);
        $model = new Lpj();
        $model->id_hibah = $id_hibah;
        $model->id_data_pemohon_hibah = $id_data_pemohon_hibah;
        $model->nm_barang = $nm_barang;
        $model->harga_barang = $harga_barang;
        $model->save(false);
        $id = $model->getPrimaryKey();


        return \yii\helpers\Json::encode(['msg' => 'Sukess']);
    }

    public function actionSimpanImg() {
        $id_data_pemohon_hibah = Yii::$app->request->post('id_data_pemohon_hibah');
        $imageFiles = Yii::$app->request->post('imageFiles');

        $model = new Lpj();
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            foreach ($model->imageFiles as $file) {
                $filename = $file->baseName . '.' . $file->extension;
                $file->saveAs('./uploads/' . $filename, false);
                $modeldetaillpj = new \backend\models\DetailLpj();
                $modeldetaillpj->isNewRecord = true;
                $modeldetaillpj->id_data_pemohon_hibah = $id_data_pemohon_hibah;
                $modeldetaillpj->foto = $filename;
                $modeldetaillpj->create_date == null;
                $modeldetaillpj->save(false);
            }
        }
    }

    /**
     * Updates an existing Lpj model.
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
     * Deletes an existing Lpj model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lpj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lpj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Lpj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUploadFile() {
        
    }

    public function actionViewDetailLpj()
    {
        $id_data_pemohon_hibah = Yii::$app->request->post('expandRowKey');
        $model = Lpj::find()->where(['id_data_pemohon_hibah'=>$id_data_pemohon_hibah]);
   //     $lpj = $model->one();
        $detaillpj = \backend\models\DetailLpj::find()->where(['id_data_pemohon_hibah'=>$id_data_pemohon_hibah])->all();
        $dataProvider = new ActiveDataProvider([
            'query'=>$model
        ]);
        
        return $this->renderPartial('view-detail-lpj',[
            'dataProvider'=>$dataProvider,
            'detaillpj'=>$detaillpj
        ]);
    }
}
