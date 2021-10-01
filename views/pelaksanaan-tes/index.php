<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'tanggal:date',
            'pelamar.nama_lengkap',
            'tes.nama',
            'nilai',

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\PelaksanaanTesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Pelaksanaan Tes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-tes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Pelaksanaan Tes Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
    <?php Pjax::end(); ?>
</div>
