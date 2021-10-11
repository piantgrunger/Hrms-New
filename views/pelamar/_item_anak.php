<?php
   use kartik\datecontrol\DateControl;
   use kartik\select2\Select2;
   use yii\helpers\ArrayHelper;
?>

<td>
<?= $form->field($model, "[$key]nama")->label(false) ?>
</td>
<td>
<?= $form->field($model, "[$key]tempat_lahir")->label(false) ?>
</td>
<td>
<?= $form->field($model, "[$key]tanggal_lahir")->widget(DateControl::className())->label(false) ?>
</td>
<td>
<?= $form->field($model, "[$key]pendidikan")->widget(Select2::className(),[
      'data' =>(ArrayHelper::map(app\models\Sekolah::find()->asArray()->all(),'kode','nama')),
        'options' => [
        'placeholder' => 'Pilih Pendidikan Terakhir ...',
    ]
    ]
    )->label(false)   
 ?>
</td>
<td>
<?= $form->field($model, "[$key]status")->dropDownList(["Anak Kandung"=>"Anak Kandung","Anak Tiri" => 'Anak Tiri','Anak Angkat' =>"Anak Angkat"])->label(false) ?>
        </td>

        
    <td>

<a data-action="delete" id='delete3'><span class="fa fa-trash">
</td>