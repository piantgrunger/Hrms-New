<?php

namespace app\controllers;

use app\models\Pegawai;
use Yii;
use app\models\Pelamar;
use app\models\PelamarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PelamarController implements the CRUD actions for Pelamar model.
 */
class PelamarController extends Controller
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
     * Lists all Pelamar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelamarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pelamar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionDiterima($id)
    {
        $model = $this->findModel($id);
        if(is_null($model->pegawai))
        {        
          $pegawai = new Pegawai();
          $pegawai->id_pelamar = $model->id;
          foreach($model->attributes  as  $attribute => $val)
          {
              if(($attribute!='id')&&($attribute!='kode') &&($attribute!=='id_lowongan'))
              {
                  $pegawai->{$attribute} = $val;
              }

          }
          $pegawai->nip = $model->kode;
          $pegawai->id_divisi = $model->lowongan->id_divisi;
          $pegawai->id_jabatan = $model->lowongan->id_jabatan;
          $pegawai->status ='Pegawai Kontrak 6 Bulan';
          $pegawai->tanggal_diterima = date("Y-m-d");     
          if($pegawai->save())
          {
            Yii::$app->session->setFlash('success', "Pegawai Telah Diterima");
          } else {
            Yii::$app->session->setFlash('error', implode ( "<br />" , \yii\helpers\ArrayHelper::getColumn ( $pegawai->errors , 0 , false ) ) );
              
          }
         return $this->redirect(['index']);
    
        } else {
            Yii::$app->session->setFlash('error', "Pegawai Sudah Diterima Sebelumnya");
            return $this->redirect(['index']);

        }  

    }

    /**
     * Creates a new Pelamar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pelamar();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailPelamarAnaks = Yii::$app->request->post('DetailPelamarAnak', []);
                if (($model->save())) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pelamar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailPelamarAnaks = Yii::$app->request->post('DetailPelamarAnak', []);
                if (($model->save())) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
 
    }

    /**
     * Deletes an existing Pelamar model.
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
     * Finds the Pelamar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pelamar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pelamar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
