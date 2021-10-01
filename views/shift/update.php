<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shift */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Shift',
]) . $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Shift'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
