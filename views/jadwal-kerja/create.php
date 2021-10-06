<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JadwalKerja */

$this->title = Yii::t('app', 'Jadwal Kerja Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jadwal Kerja'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
