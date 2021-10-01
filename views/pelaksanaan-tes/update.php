<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PelaksanaanTes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pelaksanaan Tes',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pelaksanaan Tes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pelaksanaan-tes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
