<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TukarAbsen */

$this->title = Yii::t('app', 'Tukar Absen Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tukar Absen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tukar-absen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
