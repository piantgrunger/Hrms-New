<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'kode',
            'lowongan.kode',
            'lowongan.divisi.nama',
            'lowongan.jabatan.nama',
            'nama_lengkap',
            [
                'attribute' => 'Nilai Tes',
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return $this->render('_item_view', ['model'=>$model->pelaksanaanTest]);
                },
            ],
            'nilai_test_rata_rata',
//            'nama_panggilan',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'jenis_kelamin',
            // 'no_ktp',
            // 'npwp',
            // 'alamat_ktp:ntext',
            // 'alamat_domisili:ntext',
            // 'no_hp',
            // 'email:email',
            // 'agama',
            // 'status_pernikahan',
            // 'golongan_darah',
            // 'riwayat_penyakit:ntext',
            // 'tingkat_pendidikan_terakhir',
            // 'nama_pendidikan_terakhir:ntext',
            // 'nilai_pendidikan_terakhir',
            ['attribute' => 'Status',
             'format' =>'raw',
              'value'  => function($model) {
                  return  is_null($model->pegawai)? Html::a('Terima Pegawai',['diterima','id'=>$model->id],['class'=>'btn  btn-info ']):"Pegawai Sudah Diterima";
              }
            
            ],

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route) ,    ],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\PelamarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pelamar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Pelamar Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
    <?php Pjax::end(); ?>
</div>
