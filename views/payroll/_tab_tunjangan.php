<div class="card card-success"   >
<div class="card-header bg-success"><h5> Data Tunjangan </h5>

</div>
  <div class="card-body">
     <table class="table">
     <thead>
        <tr>

            <th>Tunjangan</th>
            <th>Jumlah</th>

            <th><a id="btn-add" href="#"><span class="fa fa-plus"></span>  </a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailPayrollTunjangans,
        'model' => \app\models\DetailPayrollTunjangan::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_tunjangan',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add',
        ]
    ]);
    ?>
    </table>
   </div>

</div>