<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TunjanganLain */

$this->title = Yii::t('app', 'Tunjangan Lain Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tunjangan Lain'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunjangan-lain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
