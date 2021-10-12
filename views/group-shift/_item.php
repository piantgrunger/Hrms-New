<?php
use  kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>



<td>
  
<?= $form->field($model, "[$key]id_shift")->widget(Select2::className(),[
    'data' =>(ArrayHelper::map(\app\models\Shift::find()->asArray()->all(),'id','nama')),
    'options' => [
    'placeholder' => 'Pilih Shift ...',
]
]
)->label(false)   ?>

</td>

    <td>

    

    <a data-action="delete" id='delete3'><span class="fa fa-trash">
    <?= $form->field($model, "[$key]urutan")->hiddenInput(['value'=>($key) ])->label(false); ?>
</td>