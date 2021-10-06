<?php

use app\models\Departemen;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Divisi;
use app\models\Jabatan;
use app\models\Grade;
use app\models\Shift;
use kartik\datecontrol\DateControl;

$dataGrade = ArrayHelper::map(Grade::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDivisi = ArrayHelper::map(Divisi::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataJabatan = ArrayHelper::map(Jabatan::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDepartemen = ArrayHelper::map(Departemen::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDepartemen = ArrayHelper::map(Departemen::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_divisi')->widget(Select2::className(),[
        'data' =>$dataDivisi,
        'options' => [
        'placeholder' => 'Pilih Divisi ...',
    ]
    ]
    )  ?>

    <?= $form->field($model, 'id_departemen')->widget(Select2::className(),[
        'data' =>$dataDepartemen,
        'options' => [
        'placeholder' => 'Pilih Departemen ...',
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

    <?= $form->field($model, 'id_grade')->widget(Select2::className(),[
        'data' =>$dataGrade,
        'options' => [
        'placeholder' => 'Pilih Grade ...',
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

    <?= $form->field($model, 'no_bpjs_kesehatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_bpjs_ketenagakerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_ktp')->textArea(['rows'=>12,'style'=>'height: 120px;',]) ?>

    <?= $form->field($model, 'alamat_domisili')->textArea(['rows'=>12,'style'=>'height: 120px;',]) ?>

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
    )  
 ?>

    <?= $form->field($model, 'golongan_darah')->widget(Select2::className(),[
        'data' =>['A'=>'A' , 'B' =>'B' ,'AB' =>'AB','O' =>'O'],
        'options' => [
        'placeholder' => 'Pilih Golongan Darah ...',
    ]
    ]
    )    ?>

    <?= $form->field($model, 'riwayat_penyakit')->textArea(['rows'=>12,'style'=>'height: 120px;',]) ?>

    <?= $form->field($model, 'tingkat_pendidikan_terakhir')->widget(Select2::className(),[
        'data' =>(ArrayHelper::map(app\models\Sekolah::find()->asArray()->all(),'kode','nama')),
        'options' => [
        'placeholder' => 'Pilih Pendidikan Terakhir ...',
    ]
    ]
    )   ?>

    <?= $form->field($model, 'nama_pendidikan_terakhir')->textArea(['rows'=>12,'style'=>'height: 120px;',]) ?>

    <?= $form->field($model, 'nilai_pendidikan_terakhir')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'id_shift')->widget(Select2::className(),[
        'data' =>(ArrayHelper::map(Shift::find()->asArray()->all(),'id','nama')),
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
