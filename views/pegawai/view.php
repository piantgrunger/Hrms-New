<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pegawai'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nip',
            'id_pelamar',
            'id_divisi',
            'id_departemen',
            'id_jabatan',
            'id_grade',
            'nama_lengkap',
            'nama_panggilan',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'no_ktp',
            'npwp',
            'no_bpjs_kesehatan',
            'no_bpjs_ketenagakerjaan',
            'alamat_ktp:ntext',
            'alamat_domisili:ntext',
            'no_hp',
            'email:email',
            'agama',
            'status_pernikahan',
            'golongan_darah',
            'riwayat_penyakit:ntext',
            'tingkat_pendidikan_terakhir',
            'nama_pendidikan_terakhir:ntext',
            'nilai_pendidikan_terakhir',
        ],
    ]) ?>

</div>
