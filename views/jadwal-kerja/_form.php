<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;



$dataPegawai = ArrayHelper::map(\app\models\Pegawai::find()->asArray()->select(['id','nama_lengkap'=>"concat(nip,' - ',nama_lengkap)"])->all(),'id','nama_lengkap')

/* @var $this yii\web\View */
/* @var $model app\models\JadwalKerja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-kerja-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_pegawai')->widget(Select2::className(),
        ['data'=>$dataPegawai,
        'options' => [
            'placeholder' => 'Pilih Pegawai ...',
        ]
        ]

    
      ) ?>

    <?= $form->field($model, 'tanggal')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'id_shift')->widget(Select2::className(),[
        'data' =>(ArrayHelper::map(\app\models\Shift::find()->asArray()->all(),'id','nama')),
        'options' => [
        'placeholder' => 'Pilih Shift ...',
    ]
    ]
    )   ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
