<?php use kartik\grid\GridView;
 ?>
<div class="col-md-6">
<div class="header" style="margin-bottom :10px">

<div class="text" style="float: left;
    display: inline-block;
    vertical-align: bottom;font-family:cambria;font-size=12px " ><h4><p     align='center'><b>SLIP LEMBUR PEGAWAI </b>
</p></h4>

</div>

</div>
<hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

NIP : <?=$model->pegawai->nip?> <br>
NAMA : <?=$model->pegawai->nama_lengkap?><br>
DIVISI : <?=$model->pegawai->divisi->nama?><br>
DEPARTEMEN : <?=$model->pegawai->departemen->nama?><br>

<b><u> Rincian  Lembur </u></b>

<?= GridView::widget([
        'dataProvider' => $detail,
        //'filterModel' => $searchModel,
        'showPageSummary' => true,
        
    
        'columns' => [
        'tanggal:date',
        [
         'attribute'=>'jumlah',
         'format' =>'decimal',
         'pageSummary' => true

        ]
        ]
]);
?>