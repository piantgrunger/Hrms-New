<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pelamar */

$this->title = Yii::t('app', 'Pelamar Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pelamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelamar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
