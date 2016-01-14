<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
use yii\widgets\LinkPager;
?>
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
						<h4><small><a href="<?=Yii::$app->urlManager->createUrl(['goods/view', 'id' => $item['goods_id']])?>"><?=$goods[$item['goods_id']]['title']?></a></small></h4>
						<p>
							<?=Html::encode($item['content'])?>
						</p>
						<div class="row">
							<?=!empty($item['file']) ? implode("", Dynamic::formatFile($item['file'], "col-xs-4 col-sm-4 img-box-row")) : '';?>
						</div>
						<div class="content-foot">
							<span><span class="glyphicon glyphicon-user main-panel-user" aria-hidden="true"></span>&nbsp;<a href="<?=Yii::$app->urlManager->createUrl(['home/index', 'id' => $item['uid']])?>"><?=isset($user[$item['uid']]) ? $user[$item['uid']]['username'] : ''?></a><small><?=date("Y-m-d H:i", $item['addtime'])?></small></span>
							<div class="content-foot-ext">
								<span><a>评论(<?=$item['comment']?>)</a></span>
								<span><a>点赞(<?=$item['like']?>)</a></span>
								<span><a>浏览(<?=$item['scan']?>)</a></span>
							</div>
						</div>
					</div>
					<div class="isayb"></div>
				</div>
				</div>
			</div>
	<?php }}?>
	<?php if(isset($pages['next'])){?>
			<div class="row main" style="text-align: center;">
				<div class="col-xs-10 col-sm-10" style="float: right;">
					<a class="btn btn-default content-loading" href="javascript:;" role="button" style="width: 100%;" next-url="<?=$pages['next']?>">加载下一页</a>
				</div>
			</div>
	<?php }?>