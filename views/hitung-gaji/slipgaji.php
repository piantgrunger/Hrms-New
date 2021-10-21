<?php use yii\widgets\DetailView;
 ?>
<div class="col-md-6">
<div class="header" style="margin-bottom :10px">

<div class="text" style="float: left;
    display: inline-block;
    vertical-align: bottom;font-family:cambria;font-size=12px " ><h4><p     align='center'><b>SLIP GAJI PEGAWAI </b>
</p></h4>

</div>

</div>
<hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

NIP : <?=$model->pegawai->nip?> <br>
NAMA : <?=$model->pegawai->nama_lengkap?><br>
DIVISI : <?=$model->pegawai->divisi->nama?><br>
DEPARTEMEN : <?=$model->pegawai->departemen->nama?><br>

<b><u> Rincian Gaji </u></b>

<?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-hover',"style"=>"font-size:smaller"],
        'template' => "<tr><th >{label}</th><td style='text-align:right'>{value}.</td></tr>",

        'attributes' => [
            'gaji_pokok:decimal', 'gaji_lembur:decimal', 'tunjangan:decimal', 'potongan:decimal', 'bpjs_kesehatan_pegawai:decimal',  'bpjs_tk_pegawai:decimal','total:decimal'

        ],
    ]) ?>


