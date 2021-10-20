<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HitungGaji */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hitung Gaji',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Hitung Gaji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="hitung-gaji-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
