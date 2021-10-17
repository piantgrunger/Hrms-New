<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;

$data = ArrayHelper::map(\app\models\Potongan::find()->select(['id','nama'=>"concat(kode,' - ',nama)"])
->asArray()->all(), 'id', 'nama');

$dataPegawai = ArrayHelper::map(\app\models\Pegawai::find()->asArray()->select(['id','nama_lengkap'=>"concat(nip,' - ',nama_lengkap)"])->all(),'id','nama_lengkap')


/* @var $this yii\web\View */
/* @var $model app\models\PotonganLain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="potongan-lain-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_pegawai')->widget(Select2::className(),
        ['data'=>$dataPegawai,
        'options' => [
            'placeholder' => 'Pilih Pegawai ...',
        ]
        ]

    
      ) 
 ?>

    <?= $form->field($model, 'tanggal')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'id_potongan')->widget(Select2::classname(), [
    'data' => $data,
    'options' => [
        'placeholder' => 'Pilih Potongan ...',
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
