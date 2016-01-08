<?php 
use yii\helpers\Html;
?>
<div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;padding-top:10px;">
					<div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-envelope"></span>&nbsp;系统消息</p></div>
					<?php if(!empty($model)){foreach ($model as $k => $item){?>
					<div class="main panel-content" style="margin-bottom: 10px;">
						<div style="background-color: #fff;padding:15px 15px;">
							<div class="content-thumbnail" style="float:left;">
								<a href="#"><img alt="100%x180" src="/images/imgsize.ph.126.net.jpg"></a>
							</div>
							<div style="padding-left:80px;">
								<h4><small>Subtext for header</small></h4>
								<p><?=Html::encode($item['content'])?></p>
								<p  style="padding:10px 0px 5px 0px;">
									<span style="font-size:12px;float: left;"><?=date("Y-m-d H:i", $item['addtime'])?></span>
									<span style="font-size:12px;float: right;padding-left:5px;"><a>已查看</a></span>
								</p>
							</div>
					 </div>
				</div>
				<?php }}?>
				<div class="main panel-content" style="margin-bottom: 10px;">
						<div style="background-color: #fff;padding:15px 15px;">
							<div class="content-thumbnail" style="float:left;">
								<a href="#"><img alt="100%x180" src="/images/imgsize.ph.126.net.jpg"></a>
							</div>
							<div style="padding-left:80px;">
								<h4><small>Subtext for header</small></h4>
								<p>
									我的第一个羊毛毡作品完成啦ヽ(ﾟ∀ﾟ)ﾉ于是我又跳进了一个无底坑OTZ自己的坑加起来可以贯穿地球了】（喂po你之前买的彩铅、超轻粘土、软陶泥和橡皮章还摆在房间里呢（我不听我不听我不听qwq
								</p>
								<p  style="padding:10px 0px 5px 0px;">
									<span style="font-size:12px;float: left;">2015-11-26 10:12</span>
									<span style="font-size:12px;float: right;padding-left:5px;"><a>已查看</a></span>
								</p>
							</div>
					 </div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	</div>