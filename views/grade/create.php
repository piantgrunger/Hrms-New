<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grade */

$this->title = Yii::t('app', 'Grade Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Grade'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
