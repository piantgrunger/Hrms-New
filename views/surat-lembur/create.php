<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratLembur */

$this->title = Yii::t('app', 'Surat Lembur Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Lembur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-lembur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
