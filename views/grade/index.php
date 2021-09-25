<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\grid\GridView;


$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'kode',
            'nama',
            'gaji_pokok:decimal',

         ['class' => 'app\widgets\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ];
/* @var $this yii\web\View */
/* @var $searchModel app\models\GradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Grade');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Grade Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        
    ]); ?>
</div>
