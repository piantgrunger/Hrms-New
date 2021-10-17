<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PotonganLain */

$this->title = Yii::t('app', 'Potongan Lain Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Potongan Lain'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="potongan-lain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
