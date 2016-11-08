<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\LayoutAsset;

LayoutAsset::register($this);
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

<div class="wrap main-news">
    <?php
    NavBar::begin([
        //'brandLabel' => '<img height="70" src="/images/logo.png">',
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse ',//navbar-fixed-top
        ],
    ]);
    $menuItems = [
        ['label' => '网站首页', 'url' => ['/index']],
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
         		<div class="col-xs-12 col-md-6">
        			<img src="/images/logo.png" class="pull-left" height="80px">
        			<span class="pull-left" style="line-height: 80px;font-size: 28px;line-height: 100px;"><i class="nav-point"></i>资讯</span>
        		</div>
        		<div class="col-xs-12 col-md-6">
	        		<div class="input-group" style="line-height: 80px;">
				      <input type="text" class="sint" placeholder="请输入查询的关键字……">
				      <span class="input-group-btn"><button class="ssub" type="button">点击搜索</button></span>
				    </div>
			    </div>
        	</div>
      </div>
      <div class="container">
	      <nav class="navbar navbar-inverse navbar-static-top" style="min-height: 40px;">
			<div class="container">
				<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">首页</a></li>
					<li><a href="#about">最新资讯</a></li>
					<li><a href="#about">市场行情</a></li>
					<li><a href="#about">国际资讯</a></li>
					<li><a href="#about">地方资讯</a></li>
					<li><a href="#about">气象<i class="plate-point"></i>灾害</a></li>
					<li><a href="#about">食品安全</a></li>
					<li><a href="#about">科技<i class="plate-point"></i>机械</a></li>
				</ul>
				</div>
			</div>
		</nav>
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
