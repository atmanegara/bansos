<?php

namespace backend\controllers;

use Yii;
use backend\models\MenuHibah;
use backend\models\MenuHibahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuHibahController implements the CRUD actions for MenuHibah model.
 */
class MenuHibahController extends Controller {

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
     * Lists all MenuHibah models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MenuHibahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MenuHibah model.
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
     * Creates a new MenuHibah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new MenuHibah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing MenuHibah model.
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
     * Deletes an existing MenuHibah model.
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
     * Finds the MenuHibah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuHibah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MenuHibah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMenuItemsDetail() {
        if (isset($_POST['expandRowKey'])) {
            $model = \backend\models\MenuHibahItems::find()->where(['kd_menu' => $_POST['expandRowKey']]);
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $model
            ]);
            return $this->renderPartial('menu-items-detail', ['dataProvider' => $dataProvider]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    public function actionPermission() {
        $model = \backend\models\RefUser::find()->where(['aktif' => 'Y']);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $model,
            'key' => 'kd_user'
        ]);
        return $this->render('permission', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionMenuHak() {
        if (isset($_POST['expandRowKey'])) {
            //    $model = \backend\models\MenuHibahItems::find()->where(['kd_user'=>$_POST['expandRowKey']]);
            $model = \backend\models\MenuHibah::find()->where(['kd_user' => $_POST['expandRowKey']]);
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $model,
                'key' => 'kd_menu'
            ]);
            return $this->renderPartial('menu-items-header', ['dataProvider' => $dataProvider]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    public function actionTambahPermission() {
        return $this->render('tambah-permission');
    }
    
    

}
