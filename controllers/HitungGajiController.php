<?php

namespace app\controllers;

use app\models\DetailGroupShift;
use app\models\DetailHitungGaji;
use Yii;
use app\models\HitungGaji;
use app\models\HitungGajiSearch;
use app\models\SubdetailHitungGaji;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * HitungGajiController implements the CRUD actions for HitungGaji model.
 */
class HitungGajiController extends Controller
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
     * Lists all HitungGaji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HitungGajiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HitungGaji model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => DetailHitungGaji::find()->where(['id_hitung_gaji'=>$id])->all(),
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSlipgaji($id)
    {
        $model = DetailHitungGaji::find()->where(['id'=>$id])->one();
        $content = $this->renderPartial('slipgaji', [
            'model' => $model,
        ]);
        $pdf = new Pdf([
            // set to use core fonts only
                     'mode' => Pdf::MODE_UTF8,
            // A4 paper format
                     'marginTop' =>'4',
           'marginFooter' => '4',
                     'format' => Pdf::FORMAT_A4,
            // portrait orientation
                     'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
                     'destination' => Pdf::DEST_BROWSER,
            // your html content input
                     'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
                //     'cssFile' => '@app/web/css/print.css',
                     'defaultFont' => 'Georgia',
                 'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',

            // any css to be embedded if required
                     'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
                     'options' => ['title' => 'Cetak  '],
             // call mPDF methods on the fly
        //  'methods' =>['SetFooter'=>['Dicetak Melalui Aplikasi Banjarbaru Bagawi - BKPP BJB'],]
                 ]);

        return  $pdf->render();

    }


    public function actionSliplembur($id,$id_pegawai)
    {
        $model = DetailHitungGaji::find()->where(['id_hitung_gaji'=>$id])->one();
    
        $detail = new ArrayDataProvider([
            'allModels' => SubdetailHitungGaji::find()->where(['id_detail'=>$id,'id_pegawai'=>$id_pegawai,'jenis'=>'lembur'])->all()
        ]);    
        $content = $this->renderPartial('sliplembur', [
            'model' => $model,
            'detail' => $detail
        ]);
        $pdf = new Pdf([
            // set to use core fonts only
                     'mode' => Pdf::MODE_UTF8,
            // A4 paper format
                     'marginTop' =>'4',
           'marginFooter' => '4',
                     'format' => Pdf::FORMAT_A4,
            // portrait orientation
                     'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
                     'destination' => Pdf::DEST_BROWSER,
            // your html content input
                     'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
                //     'cssFile' => '@app/web/css/print.css',
                     'defaultFont' => 'Georgia',
                 'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',

            // any css to be embedded if required
                     'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
                     'options' => ['title' => 'Cetak  '],
             // call mPDF methods on the fly
        //  'methods' =>['SetFooter'=>['Dicetak Melalui Aplikasi Banjarbaru Bagawi - BKPP BJB'],]
                 ]);

        return  $pdf->render();

    }

    /**
     * Creates a new HitungGaji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HitungGaji();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->ProsesHitung();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HitungGaji model.
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
     * Deletes an existing HitungGaji model.
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
     * Finds the HitungGaji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HitungGaji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HitungGaji::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
