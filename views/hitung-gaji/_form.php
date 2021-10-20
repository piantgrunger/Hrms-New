<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Divisi;


$data = ArrayHelper::map(Divisi::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');


/* @var $this yii\web\View */
/* @var $model app\models\HitungGaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hitung-gaji-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'tanggal_awal')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'tanggal_akhir')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'id_divisi')->widget(Select2::className(),[
        'data' =>$data,
        'options' => [
        'placeholder' => 'Pilih Divisi ...',
    ]
    ]
    )  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Hitung'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
