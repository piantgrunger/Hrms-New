<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'id_pelamar') ?>

    <?= $form->field($model, 'id_divisi') ?>

    <?= $form->field($model, 'id_departemen') ?>

    <?php // echo $form->field($model, 'id_jabatan') ?>

    <?php // echo $form->field($model, 'id_grade') ?>

    <?php // echo $form->field($model, 'nama_lengkap') ?>

    <?php // echo $form->field($model, 'nama_panggilan') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'no_ktp') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'no_bpjs_kesehatan') ?>

    <?php // echo $form->field($model, 'no_bpjs_ketenagakerjaan') ?>

    <?php // echo $form->field($model, 'alamat_ktp') ?>

    <?php // echo $form->field($model, 'alamat_domisili') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status_pernikahan') ?>

    <?php // echo $form->field($model, 'golongan_darah') ?>

    <?php // echo $form->field($model, 'riwayat_penyakit') ?>

    <?php // echo $form->field($model, 'tingkat_pendidikan_terakhir') ?>

    <?php // echo $form->field($model, 'nama_pendidikan_terakhir') ?>

    <?php // echo $form->field($model, 'nilai_pendidikan_terakhir') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
