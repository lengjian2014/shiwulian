<?php
use mobile\widgets\FooterWidget;?>
<div class="header">
	<div class="htop">
		<a href="<?= homeUrl();?>" class="logo">&nbsp;</a>
		<div class="search">
			<form name="subsearch" action="<{:url('Goods/lists')}>">
			<span><input type="text" value="" name="keywords" /><i><input type="submit" class="subcss" value="" /></i></span>
			</form>
		</div>
	</div>
</div>
<div class="blank45"></div>
<div class="addWrap">
	<div class="swipe" id="mySwipe">
		<div class="swipe-wrap">
				<div><a href="111"><img class="img-responsive" src="images/lunbo.gif"/></a></div>
				<div><a href="111"><img class="img-responsive" src="images/lunbo.gif"/></a></div>
				<div><a href="111"><img class="img-responsive" src="images/lunbo.gif"/></a></div>
		</div>
	</div>
	<ul id="position">
			<li></li>
			<li></li>
			<li></li>
	</ul>
</div>
<div class="item">
	<div class="caption">
		<h3><a>热门推荐</a></h3>
		<span><a href="">查看全部</a></span>
	</div>
	<div class="container goodslist">
		<div class="row">
			<div class="col-xs-6">河南山坡喝呀</div>
			<div class="col-xs-6" align="right">
				<i class="icon iconfont" style="color:#FC7700">&#xe604;</i>放心指数：<span>8.0</span>
				<i class="icon iconfont">&#xe605;</i>
			</div>
			<div class="col-xs-12">
				<span>我是鸭长180</span><span class="created">创建于3小时前</span>
			</div>
			<div class="col-xs-12">
				<i class="weizhi"></i>洛阳市涧西区西苑路
			</div>
			<div class="col-xs-4"><img class="img-responsive" src="images/product.jpg"></div>
			<div class="col-xs-4"><img class="img-responsive" src="images/product.jpg"></div>
			<div class="col-xs-4"><img class="img-responsive" src="images/product.jpg"></div>
			<div class="col-xs-12">
				简介：洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路
			洛阳市涧西区西苑路洛阳市涧西区西苑路洛阳市涧西区西苑路
			</div>
			<div class="col-xs-4" align="center">
				<i class="icon iconfont">&#xe60f;</i><span>5555</span>
			</div>
			<div class="col-xs-4" align="center">
				<i class="icon iconfont">&#xe60d;</i><span>5555</span>
			</div>
			<div class="col-xs-4 jiaohu" align="center">
				<i class="icon iconfont">&#xe60e;</i><span>5555</span>
			</div>
		</div>
	</div>
	<div class="caption">
		<h3><a>农场推荐</a></h3>
		<span><a href="">查看全部</a></span>
	</div>
	<div class="container farmlist">
		<div class="row">
			<div class="col-xs-12">
				<span class="name">河南山坡喝呀</span><span class="stars"></span>
			</div>
			<div class="col-xs-12">
				<i class="farm-v"></i>
				<i class="farm-bei"></i>
				<i class="farm-ziliao"></i>
			</div>
			<div class="col-xs-12">
				<span class="farm-type">产品类型：鲜鸭肉</span>
			</div>
			<div class="col-xs-12 handle">
				<div class="col-xs-6"><i class="icon iconfont">&#xe60f;</i>5555</div>
				<div class="col-xs-6"><i class="icon iconfont">&#xe602;</i></div>
			</div>
		</div>
	</div>
</div>
<script src="js/swipe.min.js"></script>
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
	auto: 2000,
	continuous: true,
	disableScroll: false,
	callback: function(pos) {
		var i = bullets.length;
		while (i--) {
			bullets[i].className = ' ';
		}
		bullets[pos].className = 'cur';
	}
});
</script>
<div class="blank50"></div>
<?= FooterWidget::widget();
?>