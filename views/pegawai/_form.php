<?php

use app\models\Departemen;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Divisi;
use app\models\Jabatan;
use app\models\Grade;
use app\models\GroupShift;
use app\models\Shift;
use kartik\datecontrol\DateControl;
use yii\bootstrap4\Tabs;


$dataGrade = ArrayHelper::map(Grade::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDivisi = ArrayHelper::map(Divisi::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataJabatan = ArrayHelper::map(Jabatan::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDepartemen = ArrayHelper::map(Departemen::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
$dataDepartemen = ArrayHelper::map(Departemen::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');

$form = ActiveForm::begin();
$items = [
    [
        'label' => 'Keluarga',
        'content' => $this->render('_tab_anak.php', ['model' => $model, 'form' => $form]),
        'active' => true
    ],
    [
        'label' => 'Pendidikan',
        'content' => $this->render('_tab_pendidikan.php', ['model' => $model, 'form' => $form]),
    
    ],

];

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">


<div class="row">
<div class="col-md-6">

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

</div>

<div class="col-md-6">

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


    <?= $form->field($model, 'golongan_darah')->widget(Select2::className(),[
        'data' =>['A'=>'A' , 'B' =>'B' ,'AB' =>'AB','O' =>'O'],
        'options' => [
        'placeholder' => 'Pilih Golongan Darah ...',
    ]
    ]
    )    ?>

    <?= $form->field($model, 'riwayat_penyakit')->textArea(['rows'=>12,'style'=>'height: 120px;',]) ?>

    <?= $form->field($model, 'tanggal_diterima')->widget(DateControl::className()) ?>
    <?= $form->field($model, 'status')->widget(Select2::className(),[
        'data' =>['Pegawai Kontrak 3 Bulan'=>'Pegawai Kontrak 3 Bulan' , 'Pegawai Kontrak 6 Bulan'=>'Pegawai Kontrak 6 Bulan' , 'Pegawai Kontrak 1 Tahun (1)' =>'Pegawai Kontrak 1 Tahun (1)'
         ,'Pegawai Kontrak 1 Tahun (2)' =>'Pegawai Kontrak 1 Tahun (2)','Pegawai Tetap' =>'Pegawai Tetap'],
        'options' => [
        'placeholder' => 'Pilih Status ...',
    ]
    ]
    )    ?>


    <?= $form->field($model, 'status_shift')->widget(Select2::className(),[
        'data' =>['Shift'=>'Shift' ,'Group Shift' => 'Group Shift'],
        'options' => [
        'placeholder' => 'Pilih Status Shift ...',
    ]
    ]
    )    ?>


<?= $form->field($model, 'id_group_shift')->widget(Select2::className(),[
        'data' =>(ArrayHelper::map(GroupShift::find()->asArray()->all(),'id','nama')),
        'options' => [
        'placeholder' => 'Pilih Group Shift ...',
    ]
    ]
    )   ?>
    
    <?= $form->field($model, 'id_shift')->widget(Select2::className(),[
        'data' =>(ArrayHelper::map(Shift::find()->asArray()->all(),'id','nama')),
        'options' => [
        'placeholder' => 'Pilih Shift ...',
    ]
    ]
    )   ?>
</div>
</div>
<?= Tabs::widget(['items' =>  $items ,'navType' =>'nav-pills']);  ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
