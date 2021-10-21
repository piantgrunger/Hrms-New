<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use hscstudio\mimin\components\Mimin;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\HitungGaji */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Hitung Gaji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hitung-gaji-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?php if ((Mimin::checkRoute($this->context->id . "/delete"))) { ?> <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
                                                                                'class' => 'btn btn-danger',
                                                                                'data' => [
                                                                                    'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                                                                                    'method' => 'post',
                                                                                ],
                                                                            ]) ?>
        <?php } ?> </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tanggal_awal',
            'tanggal_akhir',
            'divisi.nama',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
       
        ],
        'toolbar' => [
            '{export}',
            '{toggleData}',
        ],
    
        'columns' => [
            'pegawai.nip',
            'pegawai.nama_lengkap',
            'gaji_pokok:decimal', 'gaji_lembur:decimal', 'tunjangan:decimal', 'potongan:decimal', 'bpjs_kesehatan_pegawai:decimal',  'bpjs_tk_pegawai:decimal',
            'total:decimal',


            ['class' => 'app\widgets\grid\ActionColumn',   'template' => "{slipgaji}",
            'buttons' => [
                'slipgaji' => function ($url, $model) {
                    if (Mimin::checkRoute($this->context->id . '/slipgaji')) {
                        return
                            Html::a(
                                Yii::t('app', '<i class="fa fa-print" aria-hidden="true"></i> '),
                                Url::to(['slipgaji', 'id' => $model->id]),
                                [
                                'target' => '_blank',
                                'title' => 'Cetak Slip', 'class' => 'btn btn-sm',
                                ]
                            );
                    } else {
                        return ' ';
                    }
                },]
        ], 
        ],
    ]); ?>




</div>