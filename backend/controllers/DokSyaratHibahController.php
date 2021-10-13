<?php

namespace backend\controllers;

use Yii;
use backend\models\DokSyaratHibah;
use backend\models\DokSyaratHibahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * DokSyaratHibahController implements the CRUD actions for DokSyaratHibah model.
 */
class DokSyaratHibahController extends Controller {

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
     * Lists all DokSyaratHibah models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DokSyaratHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DokSyaratHibah model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionViewDok($id_ref_hibah) {
        $model = DokSyaratHibah::find()->where(['id_ref_hibah' => $id_ref_hibah])->one();
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new DokSyaratHibah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $initialPreview = '';
        $model = new DokSyaratHibah();
        $model->id_ref_hibah = $id;
        //    $datahibah = \backend\models\RefHibah::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->filedok = \yii\web\UploadedFile::getInstance($model, 'filedok');
            if ($model->upload()) {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'initialPreview' => $initialPreview
        ]);
    }

    /**
     * Updates an existing DokSyaratHibah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        //   $initialPreview = 'http://localhost'.Url::home().'uploads/'.$model->nm_file;

        if ($model->load(Yii::$app->request->post())) {
              $model->filedok = \yii\web\UploadedFile::getInstance($model, 'filedok');
            if ($model->upload()) {
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $type = explode('.', $model->nm_file);
        $initialPreview = [];
        $initialPreviewConfig = [];
        if(file_exists('./uploads/'.$model->nm_file)){
            
        $initialPreview[] = Url::to(['./uploads/' . $model->nm_file]);
        $initialPreviewConfig[] = [
        'type' => 'office',
            'caption' => $model->nm_file,
            'url' => \yii\helpers\Url::to(['delete-by-id', 'id' => $id]),
        ];
 }
       
        return $this->render('update', [
                    'model' => $model,
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $initialPreviewConfig
        ]);
    }

    /**
     * Deletes an existing DokSyaratHibah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteById($id) {
        $model = DokSyaratHibah::find()->where(['id' => $id])->all();
        foreach ($model as $value) {
            //  return var_dump($value['path_gambar']);
            $path_file = './uploads/' . $value['nm_file'];
    //        return var_dump($path_file);
            chmod($path_file, 0777);
            unlink($path_file);
        }
        $imgpreviewconfig = [];
        return \yii\helpers\Json::encode($imgpreviewconfig);
    }

    /**
     * Finds the DokSyaratHibah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DokSyaratHibah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DokSyaratHibah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTampilDok($id) {
        $file_dok = DokSyaratHibah::find()->select('nm_file')->where(['id' => $id])->one();
        return $this->renderAjax('tampil-dok', [
                    'file_dok' => $file_dok
        ]);
    }

}
