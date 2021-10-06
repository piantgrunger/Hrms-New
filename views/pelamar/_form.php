<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use app\models\Lowongan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Pelamar */
/* @var $form yii\widgets\ActiveForm */


$data = ArrayHelper::map(Lowongan::find()->select(['lowongan.id','kode'=>"concat(lowongan.kode,' - ',divisi.nama ,' - ',jabatan.nama)"])
->leftJoin('divisi','lowongan.id_divisi=divisi.id')
->leftJoin('jabatan','lowongan.id_jabatan=jabatan.id')
->asArray()->all(), 'id','kode')
?>

<div class="pelamar-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_lowongan')->widget(Select2::className(),[
        'data' =>$data,
        'options' => [
        'placeholder' => 'Pilih Lowongan ...',
    ]
    ]
    ) ?> 

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_panggilan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::className(),[
        'data' =>['Laki-Laki'=>'Laki-laki' , 'Perempuan' =>'Perempuan'],
        'options' => [
        'placeholder' => 'Pilih Jenis Kelamin ...',
    ]
    ]
    ) ?> 


    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_ktp')->textArea(['rows'=>12,'style'=>" height: 120px;",]) ?>

    <?= $form->field($model, 'alamat_domisili')->textArea(['rows'=>12,'style'=>" height: 120px;",]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama')->widget(Select2::className(),[
        'data' =>['Islam'=>'Islam' , 'Katolik' =>'Katolik',
        'Kristen'=>'Kristen' , 'Hindu' =>'Hindu','Budha'=>'Budha' , 'Konghucu' =>'Konghucu'
    
    ],
        'options' => [
        'placeholder' => 'Pilih Agama ...',
    ]
    ]
    ) ?>

    <?= $form->field($model, 'status_pernikahan')->widget(Select2::className(),[
        'data' =>['Lajang'=>'Lajang' , 'Menikah' =>'Menikah' ,'Janda' =>'Janda','Duda' =>'Duda'],
        'options' => [
        'placeholder' => 'Pilih Status Pernikahan ...',
    ]
    ]
    )  ?>

    <?= $form->field($model, 'golongan_darah')->widget(Select2::className(),[
        'data' =>['A'=>'A' , 'B' =>'B' ,'AB' =>'AB','O' =>'O'],
        'options' => [
        'placeholder' => 'Pilih Golongan Darah ...',
    ]
    ]
    )   ?>

    <?= $form->field($model, 'riwayat_penyakit')->textArea(['rows'=>12,'style'=>" height: 120px;",]) ?>

    <?= $form->field($model, 'tingkat_pendidikan_terakhir')->widget(Select2::className(),[
      'data' =>(ArrayHelper::map(app\models\Pendidikan::find()->asArray()->all(),'kode','nama')),
        'options' => [
        'placeholder' => 'Pilih Pendidikan Terakhir ...',
    ]
    ]
    )   ?>

    <?= $form->field($model, 'nama_pendidikan_terakhir')->textArea(['rows'=>12,'style'=>" height: 120px;",]) ?>

    <?= $form->field($model, 'nilai_pendidikan_terakhir')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
