<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\Tabs;

$dataPegawai = ArrayHelper::map(\app\models\Pegawai::find()->asArray()->select(['id','nama_lengkap'=>"concat(nip,' - ',nama_lengkap)"])->all(),'id','nama_lengkap');

$form = ActiveForm::begin();
$items = [
    [
        'label' => 'Tunjangan',
        'content' => $this->render('_tab_tunjangan.php', ['model' => $model, 'form' => $form]),
        'active' => true
    ],
    [
        'label' => 'Potongan',
        'content' => $this->render('_tab_potongan.php', ['model' => $model, 'form' => $form]),
      
    ],
];


/* @var $this yii\web\View */
/* @var $model app\models\Payroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-form">

    
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_pegawai')->widget(Select2::className(),
        ['data'=>$dataPegawai,
        'options' => [
            'placeholder' => 'Pilih Pegawai ...',
        ]
        ]

    
      ) ?> 
    <?= $form->field($model, 'gaji_pokok')->textInput(['maxlength' => true]) ?>

    
    <?= Tabs::widget(['items' =>  $items ,'navType' =>'nav-pills']);  ?>


 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
