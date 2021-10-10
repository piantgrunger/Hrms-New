<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'pegawai.nama_lengkap',
            'gaji_pokok:decimal',
            'gaji_lembur:decimal',
            [
                'attribute' => 'Tunjangan',
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return $this->render('_item_view_tunjangan', ['model'=>$model->detailPayrollTunjangans]);
                },
            ],
        
            [
                'attribute' => 'Potongan',
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    return $this->render('_item_view_potongan', ['model'=>$model->detailPayrollPotongans]);
                },
            ],
        

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\PayrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Payroll');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Payroll Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
    <?php Pjax::end(); ?>
</div>
