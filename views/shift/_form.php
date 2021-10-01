<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shift */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shift-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>
    <!-- ADDED HERE -->

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textArea(['rows' => 12, 'style' => 'height: 120px;',]) ?>

    <div class="card"><div class="card-header bg-info"> Detail Shift

</div>

    <div class="card-body">

        <table id="table-shift" class="table table-bordered table-hover kv-grid-table kv-table-wrap">
            <thead>
                <tr>

                    <th width='40%'>Hari</th>
                    <th>Masuk Kerja</th>
                    <th>Pulang Kerja</th>
                 
                    <th><a id="btn-add2" href="#"><span class="fa fa-plus"></span></a></th>
                </tr>
            </thead>

            <?= \mdm\widgets\TabularInput::widget([
                'id' => 'detail-grid',
                'allModels' => $model->detailShifts,
                'model' => \app\models\DetailShift::className(),
                'tag' => 'tbody',
                'form' => $form,
                'itemOptions' => ['tag' => 'tr'],
                'itemView' => '_item',
                'clientOptions' => [
                    'btnAddSelector' => '#btn-add2',
                ]
            ]);
            ?>

            <tfoot>

            </tfoot>

        </table>
    </div>
</div>

</div>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>