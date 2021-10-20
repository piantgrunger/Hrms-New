<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HitungGaji */

$this->title = Yii::t('app', 'Hitung Gaji Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Hitung Gaji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hitung-gaji-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
