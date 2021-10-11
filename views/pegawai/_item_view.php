<div class="panel panel-success"   >
<div class="panel-heading"> Detail Pelaksanaan Tes

</div>
<div class="panel-body">
<table class="table">
    <thead>
        <tr>

            <th align="center">Tanggal</th>
            <th align="center">Tes</th>
            <th align="center">Nilai</th>
     
        </tr>
    </thead>
    <tbody>
     <?php
     $total =0;
     foreach ($model as $data) {
         ?>
       <tr>
            <td><?= yii::$app->formatter->asDate($data->tanggal)?></td>
     <td><?=$data->tes->nama?></td>
     <td align="right"><?=yii::$app->formatter->asDecimal($data->nilai, 2)?></td>


       </tr>

     <?php } ?>
    </tbody>
    <tfoot>
   
    </tfoot>

   </table>
    </div>
    </div>