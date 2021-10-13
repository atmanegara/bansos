<?php

namespace backend\controllers;

use Yii;
use backend\models\VerifikasiTapd;
use backend\models\VerifikasiTapdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\db\Query;
use backend\models\RefHibah;
/**
 * VerifikasiTapdController implements the CRUD actions for VerifikasiTapd model.
 */
class VerifikasiTapdController extends Controller
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
     * Lists all VerifikasiTapd models.
     * @return mixed
     */
    public function actionIndexOld()
    {
        $searchModel = new VerifikasiTapdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex()
    {
        $query = RefHibah::find();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>$query
        ]);
        return $this->render('index-data-hibah',[
            'dataProvider'=>$dataProvider
        ]);
    }
    /**
     * Displays a single VerifikasiTapd model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VerifikasiTapd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VerifikasiTapd();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VerifikasiTapd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VerifikasiTapd model.
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

    /**
     * Finds the VerifikasiTapd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VerifikasiTapd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VerifikasiTapd::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionVerifikasiHibah()
    {
        $id = Yii::$app->request->post('id');
        $catatan = Yii::$app->request->post('catatan');
        $reupload = Yii::$app->request->post('reupload');
        $pagu_usulan = Yii::$app->request->post('pagu_usulan');
        
        $modelDokPemohonHibah = \backend\models\DokPemohonHibah::findOne($id);
        $id_data_pemohon_hibah = $modelDokPemohonHibah->id_data_pemohon_hibah;
        $modelDokPemohonHibah->reupload=$reupload;
        $modelDokPemohonHibah->catatan=$catatan;
        if($modelDokPemohonHibah->save(false)){
           $model = new VerifikasiTapd();
           $model->isNewRecord=true;
           $model->id_data_pemohon_hibah=$id_data_pemohon_hibah;
           $model->pagu_usulan = $pagu_usulan;
             $model->status_verifikasi=$reupload;
             $model->catatan=$catatan;
        $model->save(false);
            }
        
            return Json::encode(['msg'=>'sukses']);
        
    }
         public function actionPemohonList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
        $query = (new Query);
        $query->select('b.id, c.nama AS text')
            ->from('verifikasi_tapd a')
                ->innerJoin('data_pemohon_hibah b','a.id_data_pemohon_hibah=b.id')
                ->innerJoin('ref_pemohon c','b.id_ref_pemohon=c.id')
            ->where(['like', 'c.nama', $q])
                ->andWhere(['a.status_verifikasi'=>'2'])
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => RefPemohon::findOne($id)->nama];
    }
    return $out;
}

public function actionViewPemohonHibah($id_hibah){
    $queryPemohon = (new Query())
            ->select('a.id as id_pemohon_hibah,b.id,b.nama,a.nm_tempat,a.nm_keg,a.pagu_permintaan,d.status_verifikasi,d.pagu_usulan')
            ->from('data_pemohon_hibah a')
            ->innerJoin('ref_pemohon b','a.id_ref_pemohon=b.id')
            ->innerJoin('verifikasi_tapd d','a.id=d.id_data_pemohon_hibah')
            ->innerJoin('ref_hibah c','a.id_hibah=c.id')
            ->where(['c.id'=>$id_hibah]);
    $dataProvider = new \yii\data\ActiveDataProvider([
        'query'=>$queryPemohon,
        'key'=>'id_pemohon_hibah',
        'pagination'=>[
            'pageSize'=>10
        ]
    ]);
    return $this->render('view-pemohon-hibah', [
        'dataProvider'=>$dataProvider
    ]);
}

public function actionPemohonHibahDetail() {
    if (isset($_POST['expandRowKey'])) {
        $model = \backend\models\DataPemohonHibah::find()->where(['id'=>$_POST['expandRowKey']]);
        return $this->renderPartial('_book-details', ['model'=>$model]);
    } else {
        return '<div class="alert alert-danger">No data found</div>';
    }
}

}
