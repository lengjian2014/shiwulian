<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img height="70" src="/images/logo.png">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '广场', 'url' => ['/site/about']],
        ['label' => '行业资讯', 'url' => ['/news/index']],
        ['label' => '技术交流', 'url' => ['/forum/index']],
        ['label' => '农业教程', 'url' => ['/course/index']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
    ]);
    $menuItems = [];
	if (Yii::$app->user->isGuest) {
		$menuItems[] = '<li><span class="ico_login"></span> <a href="#">登录</a> / <a href="#">注册</a></li>';
	} else {
		$menuItems[] = '<li>'
				. Html::beginForm(['/site/logout'], 'post')
				. Html::submitButton(
						'Logout (' . Yii::$app->user->identity->username . ')',
						['class' => 'btn btn-link']
				)
				. Html::endForm()
				. '</li>';
	}
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right login'],
		'items' => $menuItems,
		]);
    NavBar::end();
    ?>
    
    <div class="jumbotron">
      <div class="container">
        	<div class="row">
        		<div class="col-xs-12 col-md-6 breadcrumbs-bar">
        			<div style="float: left;padding-top: 8px;color:#a3a3a3;">当前位置：</div><?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        		</div>
        		<div class="col-xs-12 col-md-6">
	        		<div class="input-group">
				      <input type="text" class="sint" placeholder="请输入查询的关键字……">
				      <span class="input-group-btn"><button class="ssub" type="button">Go!</button></span>
				    </div>
			    </div>
        	</div>
      </div>
    </div>
    
    <div class="container">
        <?//= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
