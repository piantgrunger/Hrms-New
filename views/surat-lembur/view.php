<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\SuratLembur */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Lembur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-lembur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pegawai',
            'tanggal',
            'jam_lembur',
            'l1',
            'l2',
            'l3',
            'l1_libur',
            'l2_libur',
            'l3_libur',
        ],
    ]) ?>

</div>
