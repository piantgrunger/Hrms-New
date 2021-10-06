<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tunjangan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tunjangan',
]) . $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tunjangan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tunjangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
