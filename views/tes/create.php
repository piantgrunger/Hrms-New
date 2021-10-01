<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tes */

$this->title = Yii::t('app', 'Tes Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
