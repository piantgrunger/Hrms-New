<?php
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<?= $form->field($model, 'tingkat_pendidikan_terakhir')->widget(Select2::className(),[
      'data' =>(ArrayHelper::map(app\models\Sekolah::find()->asArray()->all(),'kode','nama')),
        'options' => [
        'placeholder' => 'Pilih Pendidikan Terakhir ...',
    ]
    ]
    )   ?>

    <?= $form->field($model, 'nama_pendidikan_terakhir')->textArea(['rows'=>12,'style'=>" height: 120px;",]) ?>

 
 
    <?= $form->field($model, 'nilai_pendidikan_terakhir')->textInput(['maxlength' => true]) ?>

