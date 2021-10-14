<?php

namespace app\controllers;

use Yii;
use app\models\SuratCuti;
use app\models\SuratCutiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\helpers\myhelpers;
use app\models\Absen;

/**
 * SuratCutiController implements the CRUD actions for SuratCuti model.
 */
class SuratCutiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all SuratCuti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratCutiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratCuti model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratCuti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratCuti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionApprove($id)
    {

        $model = $this->findModel($id);
        $tgl = date_create($model->tanggal_dari);
        $akhir = date_create($model->tanggal_sampai);
        while ($tgl <= $akhir) {
            $tgl2 = date_format($tgl, 'Y-m-d');
            if (!myhelpers::isLibur($tgl2, $model->id_pegawai)) {
                    $model1 = Absen::find()->where(['id_pegawai' => $model->id_pegawai])->andWhere("tanggal ='$tgl2'")->one();
                    if (is_null($model1)) {
                        $model1 = new Absen();
                    }
           //         $model1->scenario = 'Cuti';
                    $model1->tanggal = $tgl2;
                    $model1->id_jenis_absen = $model->id_jenis_absen;
                    $model1->id_pegawai = $model->id_pegawai;
                    //   $model1->masuk_kerja = '00:00';
                    // $model1->pulang_kerja = '00:00';
                    $model1->id_cuti = $model->id;
                    $model1->terlambat =0;
                    $model1->pulang_awal =0;
                    if($model1->save())      {
                        Yii::$app->session->setFlash('success', "Cuti Telah Diterima");
                      } else {
                        Yii::$app->session->setFlash('error', implode ( "<br />" , \yii\helpers\ArrayHelper::getColumn ( $model1->errors , 0 , false ) ) );
                          
                      }
                
                
            }
            date_add($tgl, date_interval_create_from_date_string('1 days'));
        }
        
        return $this->redirect(['index']);

    }

    /**
     * Updates an existing SuratCuti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratCuti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
       try
      {
        $this->findModel($id)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }

    /**
     * Finds the SuratCuti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratCuti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratCuti::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
