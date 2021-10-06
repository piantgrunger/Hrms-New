<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = Yii::t('app', 'Pendidikan Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pendidikan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
