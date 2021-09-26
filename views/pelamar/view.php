<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Pelamar */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pelamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-view">

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
            'kode',
            'id_lowongan',
            'nama_lengkap',
            'nama_panggilan',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'no_ktp',
            'npwp',
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
