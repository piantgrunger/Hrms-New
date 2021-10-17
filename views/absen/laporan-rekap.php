<?php

use app\models\JenisAbsen;
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'pegawai.nama_lengkap',
            [
                'attribute' =>'Divisi',
                'value' =>'pegawai.divisi.nama'
            ],
            [
                'attribute' =>'departemen',
                'value' =>'pegawai.departemen.nama'
            ],
            [
                'attribute' =>'Jabatan',
                'value' =>'pegawai.jabatan.nama'
            ],
          
      ];

      $data = JenisAbsen::find()->all();
      foreach($data as $jenis){
       $gridColumns [] =[
           'attribute' => $jenis->nama,
           'value' => function($model) use($searchModel,$jenis) {
                return $model->pegawai->getJumlahAbsen($jenis->id,$searchModel->tanggal_dari,$searchModel->tanggal_sampai);
 
           }
       ];
      } 
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratLemburSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Lembur Rekap');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-lembur-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns, 
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'before' => $this->render('_search-rekap', ['model' => $searchModel]),
      
        ],
        'toolbar' => [
            '{export}',
            '{toggleData}',
        ],
       
    ]); ?>
    <?php Pjax::end(); ?>
</div>
