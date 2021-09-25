<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\Divisi;
use app\models\Jabatan;


$dataDivisi = ArrayHelper::map(Divisi::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataJabatan = ArrayHelper::map(Jabatan::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');

/* @var $this yii\web\View */
/* @var $model app\models\Lowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lowongan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->widget(DateControl::className()) ?>

 
    <?= $form->field($model, 'id_divisi')->widget(Select2::className(),[
        'data' =>$dataDivisi,
        'options' => [
        'placeholder' => 'Pilih Divisi ...',
    ]
    ]
    ) ?>
    <?= $form->field($model, 'id_jabatan')->widget(Select2::className(),[
        'data' =>$dataJabatan,
        'options' => [
        'placeholder' => 'Pilih Jabatan ...',
    ]
    ]
    ) ?>
    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
