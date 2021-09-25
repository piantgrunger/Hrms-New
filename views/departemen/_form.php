<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Divisi;


$data = ArrayHelper::map(Divisi::find()->select(['id','kode'=>"concat(kode,' - ',nama)"])->asArray()->all(), 'id','kode');
/* @var $this yii\web\View */
/* @var $model app\models\Departemen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departemen-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_divisi')->widget(Select2::className(),[
        'data' =>$data,
        'options' => [
        'placeholder' => 'Pilih Divisi ...',
    ]
    ]
    ) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
