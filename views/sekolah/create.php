<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sekolah */

$this->title = Yii::t('app', 'Sekolah Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Sekolah'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sekolah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
