<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Tunjangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tunjangan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis')->widget(Select2::className(), [
                              "data" => [   "Tunjangan Tetap" => "Tunjangan Tetap",
                                 "Tunjangan Tukar Shift" => "Tunjangan Berdasarkan Tukar Shift",
                                 "Tunjangan Kehadiran" => "Tunjangan Berdasarkan Kehadiran",
                                 "Tunjangan Premi Shift" => "Tunjangan Berdasarkan Premi Shift",
                                 
                                ]
                              ])?>
    <?= $form->field($model, 'id_shift')->widget(Select2::className(), [
                              "data" => (ArrayHelper::map(\app\models\Shift::find()->asArray()->all(),'id','nama')),
                              'options' => [
                                'placeholder' => 'Pilih Shift ...',
                            ]
                        
                              ]  
                              )  ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
