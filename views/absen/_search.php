<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AbsenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_jenis_absen') ?>

    <?= $form->field($model, 'masuk_kerja') ?>

    <?php // echo $form->field($model, 'pulang_kerja') ?>

    <?php // echo $form->field($model, 'terlambat') ?>

    <?php // echo $form->field($model, 'pulang_awal') ?>

    <?php // echo $form->field($model, 'lembur') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
