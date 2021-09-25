<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [


        'template/vendors/mdi/css/materialdesignicons.min.css',
        'template/vendors/css/vendor.bundle.base.css',
        'template/css/style.css',
    ];
    public $js = [
      //  "template/vendors/js/vendor.bundle.base.js",
        "template/vendors/chart.js/Chart.min.js",
        "template/js/off-canvas.js",
         "template/js/hoverable-collapse.js",
         "template/js/misc.js",
    ];
    public $depends = [
       'yii\web\YiiAsset',
    'yii\bootstrap4\BootstrapAsset',
    'rmrevin\yii\fontawesome\AssetBundle',
        //additional import of third party alert project
    ];
}
