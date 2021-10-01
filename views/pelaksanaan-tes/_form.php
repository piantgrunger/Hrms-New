<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datecontrol\DateControl;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Pelamar;
use app\models\Tes;


$dataPelamar = ArrayHelper::map(Pelamar::find()->select(['id','kode'=>"concat(kode,' - ',nama_lengkap)"])->asArray()->all(), 'id','kode');
$dataTes = ArrayHelper::map(Tes::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');


/* @var $this yii\web\View */
/* @var $model app\models\PelaksanaanTes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelaksanaan-tes-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'tanggal')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'id_pelamar')->widget(Select2::className(),[
        'data' =>$dataPelamar,
        'options' => [
        'placeholder' => 'Pilih Pelamar ...',
    ]
    ]
    ) ?> 

    <?= $form->field($model, 'id_tes')->widget(Select2::className(),[
        'data' =>$dataTes,
        'options' => [
        'placeholder' => 'Pilih Tes ...',
    ]
    ]
    ) ?>

    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
