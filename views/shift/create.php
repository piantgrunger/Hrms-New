<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shift */

$this->title = Yii::t('app', 'Shift Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Shift'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
