<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\widgets\Alert;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?=$this->render('header')?>  
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?=$this->render('left')?>  

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">

              <div class="col-12">
                <span class="d-flex align-items-center text-right">
                <nav aria-label="breadcrumb">
                   <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                      ]) ?>
		          </nav>        </span>
              </div>
            </div>
            <div class="card" id="proBanner">

              <div class="card-body">

            <?=$content?>
              </div>
              
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © AlfianNaufal.id <?=date('Y')?></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
