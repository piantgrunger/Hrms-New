<?php
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<?= $form->field($model, 'status_pernikahan')->widget(Select2::className(),[
        'data' =>['Lajang'=>'Lajang' , 'Menikah' =>'Menikah' ,'Janda' =>'Janda','Duda' =>'Duda'],
        'options' => [
        'placeholder' => 'Pilih Status Pernikahan ...',
    ]
    ]
    )  ?>

<?= $form->field($model,'nama_pasangan') ?>

<div class="card "   >
<div class="card-header bg-info"><h5> Data Anak </h5>

</div>
  <div class="card-body">
     <table class="table">
     <thead>
        <tr>

            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>

            <th>Pendidikan Terakhir</th>

            <th>Status</th>


            <th><a id="btn-addx" href="#"><span class="fa fa-plus"></span>  </a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-gridx',
        'allModels' => $model->detailPelamarAnaks,
        'model' => \app\models\DetailPelamarAnak::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_anak',
        'clientOptions' => [
            'btnAddSelector' => '#btn-addx',
        ]
    ]);
    ?>
    </table>
   </div>

</div>