<div class="card card-danger"   >
<div class="card-header bg-danger"><h5> Data Potongan </h5>

</div>
  <div class="card-body">
     <table class="table">
     <thead>
        <tr>

            <th>Potongan</th>
            <th>Jumlah</th>

            <th><a id="btn-addx" href="#"><span class="fa fa-plus"></span>  </a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-gridx',
        'allModels' => $model->detailPayrollPotongans,
        'model' => \app\models\DetailPayrollPotongan::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_potongan',
        'clientOptions' => [
            'btnAddSelector' => '#btn-addx',
        ]
    ]);
    ?>
    </table>
   </div>

</div>