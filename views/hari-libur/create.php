<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HariLibur */

$this->title = Yii::t('app', 'Hari Libur Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Hari Libur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-libur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
