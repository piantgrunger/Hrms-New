<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tes',
]) . $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
