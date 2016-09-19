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
        'css/animate.css',
        'css/icomoon.css',
        'css/magnific-popup.css',
        'css/salvattore.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery.easing.1.3',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.waypoints.min.js',
        'js/main.min.js',
        'js/respond.min.js',
        'js/salvattore.min.js',
        'js/unveil.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
