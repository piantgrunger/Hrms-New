<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Divisi;

$dataDivisi = ArrayHelper::map(Divisi::find()->select(['id', 'kode' => "concat(kode,' - ',nama)"])->asArray()->all(), 'id', 'kode');


/* @var $this yii\web\View */
/* @var $model app\models\SuratLemburSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-lembur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['laporan-rekap'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">   
    <div class="col-md-6">
     <?= $form->field($model, 'tanggal_dari')->widget(\kartik\datecontrol\DateControl::className()) ?>
     </div>
     <div class="col-md-6">
    <?= $form->field($model, 'tanggal_sampai')->widget(\kartik\datecontrol\DateControl::className()) ?>

    </div>
</div>


    <?= $form->field($model, 'divisi')->widget(
        Select2::className(),
        [
            'data' => $dataDivisi,
            'options' => [
                'placeholder' => 'Pilih Divisi ...',
            ]
        ]
    )  ?> 

    <?php // echo $form->field($model, 'l2') 
    ?>

    <?php // echo $form->field($model, 'l3') 
    ?>

    <?php // echo $form->field($model, 'l1_libur') 
    ?>

    <?php // echo $form->field($model, 'l2_libur') 
    ?>

    <?php // echo $form->field($model, 'l3_libur') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>