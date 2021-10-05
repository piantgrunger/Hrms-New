<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratCuti */

$this->title = Yii::t('app', 'Surat Cuti Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Cuti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
