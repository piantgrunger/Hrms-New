<?php


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
            'h1',
             'h2',
             'h3',
             'h4',
             'h5',
             'h6',
             'h7',
             'h8',
             'h9',
             'h10',
             'h11',
             'h12',
             'h13',
             'h14',
             'h15',
             'h16',
             'h17',
             'h18',
             'h19',
             'h20',
             'h21',
             'h22',
             'h23',
             'h24',
             'h25',
             'h26',
             'h27',
             'h28',
             'h29',
             'h30',
             'h31',
    
      ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratLemburSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Absen Detail');
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
            'before' => $this->render('_search', ['model' => $searchModel]),
      
        ],
        'toolbar' => [
            '{export}',
            '{toggleData}',
        ],
       
    ]); ?>
    <?php Pjax::end(); ?>
</div>
