<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Potongan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Potongan',
]) . $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Potongan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="potongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
