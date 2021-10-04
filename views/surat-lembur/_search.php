<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratLemburSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-lembur-search">

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

    <?= $form->field($model, 'jam_lembur') ?>

    <?= $form->field($model, 'l1') ?>

    <?php // echo $form->field($model, 'l2') ?>

    <?php // echo $form->field($model, 'l3') ?>

    <?php // echo $form->field($model, 'l1_libur') ?>

    <?php // echo $form->field($model, 'l2_libur') ?>

    <?php // echo $form->field($model, 'l3_libur') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
