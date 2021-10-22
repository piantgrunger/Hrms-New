<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */

$this->title = Yii::t('app', 'Penilaian Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Penilaian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
