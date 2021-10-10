<div class="card card-success"   >
<div class="card-header"> Tunjangan

</div>
<div class="card-body">
<table class="table">
    <thead>
        <tr>

            <th align="center">Tunjangan</th>
       
            <th align="center">Nilai</th>
     
        </tr>
    </thead>
    <tbody>
     <?php
     $total =0;
     foreach ($model as $data) {
         ?>
       <tr>
     <td><?=$data->tunjangan->nama?></td>
     <td align="right"><?=yii::$app->formatter->asDecimal($data->jumlah, 2)?></td>


       </tr>

     <?php } ?>
    </tbody>
    <tfoot>
   
    </tfoot>

   </table>
    </div>
    </div>