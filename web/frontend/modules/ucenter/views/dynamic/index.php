<?php 

use yii\helpers\Html;
use frontend\models\Dynamic;
?>
      <div class="row">
			<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">我的动态</a></li>
				  <li class="active">动态列表</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding-top: 0px;">
					<?php if(!empty($model)){ foreach ($model as $k => $item){?>
					<div class="row main dynamic-content">
						<div class="col-sm-1"></div>
						<div class="col-xs-12 col-sm-10">
							<div class="subject">
								<h4><small><a>百凤野鸡蛋30枚装 农家散养 柴鸡蛋 草鸡蛋 新鲜七彩野山鸡土鸡蛋</a></small></h4>
								<p>
									<?=Html::encode($item['content'])?>
								</p>
								<div class="row dynamic-img">
									<?=implode("", Dynamic::formatFile($item['file']));?>
								</div>
								<div class="content-foot">
									<span><span class="glyphicon glyphicon-user main-panel-user" aria-hidden="true"></span>&nbsp;<a href="">moleng</a><small>2015/11/15</small></span>
									<div class="content-foot-ext">
										<span><a>评论(<?=intval($item['comment'])?>)</a></span>
										<span><a>追溯(<?=intval($item['comment'])?>)</a></span>
										<span><a>浏览(<?=intval($item['scan'])?>)</a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }}?>
				</div>
		</div>		
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>