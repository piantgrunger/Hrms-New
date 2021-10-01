<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PelaksanaanTes */

$this->title = Yii::t('app', 'Pelaksanaan Tes Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pelaksanaan Tes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelaksanaan-tes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
