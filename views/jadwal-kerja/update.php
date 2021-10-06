<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JadwalKerja */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jadwal Kerja',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jadwal Kerja'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jadwal-kerja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
