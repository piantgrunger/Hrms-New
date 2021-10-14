<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

$gridColumns=[['class' => 'kartik\grid\SerialColumn'], 
            'pegawai.nama_lengkap',
            'tanggal_dari:date',
            'tanggal_sampai:date',
            'jenisAbsen.nama',
            'keterangan:ntext',

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route) . ' {approve}', 
              'buttons' => [
                'approve' => function ($url, $model) {
                    if (Mimin::checkRoute($this->context->id . '/approve')) {
                        return
                            Html::a(
                                Yii::t('app', '<i class="fa fa-check" aria-hidden="true"></i> '),
                                Url::to(['approve', 'id' => $model->id]),
                                [
                                'title' => 'Approve',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Apakah Anda yakin ingin mengapprove cuti ini??'),
                                    
                                ],
                                ]
                            );
                    } else {
                        return ' ';
                    }
                },]],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratCutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Surat Cuti');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Surat Cuti Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
</div>
