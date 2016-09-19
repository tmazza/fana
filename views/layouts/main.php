<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
    <!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="http://github.com/tmazza" />

  <!-- Facebook and Twitter integration -->
<!--     <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" /> -->

    <link rel="shortcut icon" href="favicon.ico?v4">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <?= Html::csrfMetaTags() ?>
    <!---ADD-->
    <?php $this->head() ?>
    <!---ADD-->

    </head>
    <body>
    <?php $this->beginBody() ?>
        
<!--     <div id="fh5co-offcanvass">
        <a href="#" class="fh5co-offcanvass-close js-fh5co-offcanvass-close">Menu <i class="icon-cross"></i> </a>
        <h1 class="fh5co-logo"><a class="navbar-brand" href="#!">
            <img src='images/logo.png' style="width:200px;" />
        </a></h1>
        <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="fh5co-lead">Connect with us</h3>
        <p class="fh5co-social-icons">
            <a href="#"><i class="icon-twitter"></i></a>
            <a href="#"><i class="icon-facebook"></i></a>
            <a href="#"><i class="icon-instagram"></i></a>
            <a href="#"><i class="icon-dribbble"></i></a>
            <a href="#"><i class="icon-youtube"></i></a>
        </p>
    </div> -->
    <header id="fh5co-header" role="banner">
        <div class="container" style="margin-bottom:140px;">
            <div class="row">
                <div class="col-md-12">
                    <!-- <a href="#" class="fh5co-menu-btn js-fh5co-menu-btn">Menu <i class="icon-menu"></i></a> -->
                    <a class="navbar-brand" href="<?=Url::to(['/site/index']);?>">
                        <img src="images/load.gif" style="width:100%"  data-src='images/adesivo_logo_fana.png' style="width:100%;" />
                    </a>        
                </div>
            </div>
        </div>
    </header>
    <!-- END .header -->
    
    
    <div id="fh5co-main">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer id="fh5co-footer">
        <div class="container">
            <div class="row row-padded">
                <div class="col-md-12 text-center">
                    <p class="fh5co-social-icons">
                        <a href="https://www.facebook.com/fanaConfeccoes/"><i class="icon-facebook"></i></a>
                    </p>
                    <p>
                    <small>&copy; Fana Confecções. Todos os direitos reservados. <br>
                    Designed by: <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a> | 
                    Developed by: <a href="http://github.com/tmazza" target="_blank">tmazza</a> </small></p>
                </div>
            </div>
        </div>
    </footer>


    <?php $this->endBody() ?>

    <script type="text/javascript">
        $(document).ready(function() {
          $("img").unveil();
        });
    </script>
</body>
</html>
<?php $this->endPage() ?>
