<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
?>
<div class="row content">
		<div class="col-xs-12 col-lg-3" style="float: right;">
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;发布动态</p></div></li>
				<li class=""><div style="padding: 10px 15px 10px 15px;"><textarea class="form-control" rows="3"></textarea></div></li>
				<li class="">
					<div style="padding-bottom: 20px;padding-right:15px;float:right;">
						<a type="button" class="btn btn-default"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a>
						<a type="button" class="btn btn-default"><span class="glyphicon glyphicon-film" aria-hidden="true"></span></a>
						<button type="button" class="btn btn-default">发布动态</button>
					</div>
				</li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;分类筛选</p></div></li>
				<li class="right-sidebar-key">
					<span class="label label-default">Default</span>
					<span class="label label-primary">Primary</span>
					<span class="label label-success">Success</span>
					<span class="label label-info">Info</span>
					<span class="label label-warning">Warning</span>
					<span class="label label-danger">Danger</span>
					<span class="label label-default">Default</span>
					<span class="label label-primary">Primary</span>
					<span class="label label-success">Success</span>
					<span class="label label-info">Info</span>
					<span class="label label-warning">Warning</span>
					<span class="label label-danger">Danger</span>
				</li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;动态类别</p></div></li>
				<li class=""><a href="#" class="">食品原料信息</a></li>
				<li class=""><a href="#" class="">原料加工信息</a></li>
				<li class=""><a href="#" class="">物流运输信息</a></li>
				<li class=""><a href="#" class="">食品生产信息</a></li>
				<li class=""><a href="#" class="">食品销售信息</a></li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar">
				<li class="right-sidebar-accounts"><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
				<li><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
				<li><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;分类筛选</p></div></li>
				<li class="right-sidebar-key">
					<span class="label label-default">Default</span>
					<span class="label label-primary">Primary</span>
					<span class="label label-success">Success</span>
					<span class="label label-info">Info</span>
					<span class="label label-warning">Warning</span>
					<span class="label label-danger">Danger</span>
					<span class="label label-default">Default</span>
					<span class="label label-primary">Primary</span>
					<span class="label label-success">Success</span>
					<span class="label label-info">Info</span>
					<span class="label label-warning">Warning</span>
					<span class="label label-danger">Danger</span>
				</li>
			</ul>
		</div>
		<div class="col-xs-12 col-lg-8" style="float: right;">
			<div class="main">
				<div class="col-xs-2 col-lg-2"></div>
				<div class="col-xs-10 col-lg-10" style="margin-bottom:20px;padding-left:10px">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-default active"><input type="checkbox" autocomplete="off" checked> 全部</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 食品原料生产</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 原料检疫检验</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 原料初加工</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 原料运输储存</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 食品生产</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 食品检疫检验</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 食品运输储存</label>
				  <label class="btn btn-default"><input type="checkbox" autocomplete="off"> 批发销售</label>
				</div>
				</div>
			</div>
			<?php if(!empty($model)){foreach ($model as $k => $item){?>
			<div class="row main">
				<div class="col-xs-2 col-sm-2">
					<div class="content-thumbnail">
						<a href="#"><img alt="100%x180" src="images/imgsize.ph.126.net.jpg"></a>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10">
					<div class="panel-content">
					<div class="subject">
						<h4><small><a><?=$goods[$item['goods_id']]['title']?></a></small></h4>
						<p>
							<?=Html::encode($item['content'])?>
						</p>
						<div class="row">
							<?=implode("", Dynamic::formatFile($item['file'], "col-xs-4 col-sm-4 img-box-row"));?>
						</div>
						<div class="content-foot">
							<span><span class="glyphicon glyphicon-user main-panel-user" aria-hidden="true"></span>&nbsp;<a href="">moleng</a><small>2015/11/15</small></span>
							<div class="content-foot-ext">
								<span><a>评论(12)</a></span>
								<span><a>追溯(34)</a></span>
								<span><a>浏览(111)</a></span>
							</div>
						</div>
					</div>
					<div class="isayb"></div>
				</div>
				</div>
			</div>
		<?php }}?>
		</div>
	  </div>