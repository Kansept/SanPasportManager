<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\JasnyBootstrapAsset;

AppAsset::register($this);
JasnyBootstrapAsset::register($this);
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

<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
  <a class="navmenu-brand" href="#">Project name</a>
  <ul class="nav navmenu-nav">
    <li><?= Html::a('Home', ['site/index']) ?></li>
    <li><?= Html::a('Регионы', ['region/index']) ?></li>
    <li><?= Html::a('Операторы', ['mobile-operator/index']) ?></li>
    <li><?= Html::a('БС', ['base-station/index']) ?></li>
    <li><?= Html::a('Статусы проекта', ['status/index']) ?></li>
    <li><?= Html::a('Заказчики', ['customer/index']) ?></li>
    <li><?= Html::a('Документы', ['document/index']) ?></li>
  </ul>
</nav>

<div class="navbar navbar-default navbar-fixed-top">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>

<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php
        /*
$script = <<< JS
  $('.navmenu').offcanvas();
JS;
$this->registerJs($script);
         */
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
