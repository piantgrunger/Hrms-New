<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tunjangan */

$this->title = Yii::t('app', 'Tunjangan Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tunjangan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tunjangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
