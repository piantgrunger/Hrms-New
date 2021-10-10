<?php

namespace app\controllers;

use Yii;
use app\models\Payroll;
use app\models\PayrollSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayrollController implements the CRUD actions for Payroll model.
 */
class PayrollController extends Controller
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
     * Lists all Payroll models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PayrollSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payroll model.
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
     * Creates a new Payroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payroll();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $transaction = Yii::$app->db->beginTransaction();
            try {
            $model->gaji_lembur = $model->pegawai->divisi->umk / 173;
            $model->detailPayrollTunjangans = Yii::$app->request->post('DetailPayrollTunjangan', []);
            $model->detailPayrollPotongans = Yii::$app->request->post('DetailPayrollPotongan', []);
       

            if( $model->save())
            {
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
     * Updates an existing Payroll model.
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
            $model->gaji_lembur = $model->pegawai->divisi->umk / 173;
            $model->detailPayrollTunjangans = Yii::$app->request->post('DetailPayrollTunjangan', []);
            $model->detailPayrollPotongans = Yii::$app->request->post('DetailPayrollPotongan', []);
       

            if( $model->save())
            {
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
     * Deletes an existing Payroll model.
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
     * Finds the Payroll model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payroll the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payroll::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
