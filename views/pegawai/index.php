<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'nip',
            //'id_pelamar',
            'divisi.nama',
            'departemen.nama',
            // 'id_jabatan',
            // 'id_grade',
             'nama_lengkap',
            // 'nama_panggilan',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'jenis_kelamin',
             'no_ktp',
            // 'npwp',
            // 'no_bpjs_kesehatan',
            // 'no_bpjs_ketenagakerjaan',
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

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pegawai');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Pegawai Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
    <?php Pjax::end(); ?>
</div>
