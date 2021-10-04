<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuratLembur */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Surat Lembur',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Lembur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="surat-lembur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
