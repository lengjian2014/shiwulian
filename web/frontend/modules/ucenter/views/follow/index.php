<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">我关注的</a></li>
				  <li class="active">关注产品</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding-top: 10px;">
				<div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-th-list"></span>&nbsp;关注的产品</p></div>
				  <div class="row" style="padding-left:15px;padding-right:15px;">
				  <?php if(!empty($model)){foreach ($model as $k => $v){?>
					<div class="col-xs-12 col-lg-3" style="padding-left:5px;padding-right:5px;">
							<div class="thumbnail">
							<div class="row">
								<div class="col-xs-5 col-lg-12">
									<img alt="100%x200" style="height: 200px; width: 100%; display: block;" src="<?php $picture=explode("|", $v['picture']); echo IMGURL . $picture[0];?>">
								</div>
								<div class="col-xs-7 col-lg-12">
								<div class="caption">
									<h4 style="margin-top:0px;height:70px;"><a href="<?=Yii::$app->urlManager->createUrl(['goods/view', 'id' => $v['goods_id']])?>" target="_black"><small><?=Html::encode($v['title'])?></small></a></h4>
									<a class="btn btn-default" type="buttom" style="float:right;width:100%" href="/ucenter/follow/cancel/<?=$v['id']?>">取消关注</a>
								</div>
								</div>
							</div>
							</div>
						</div>
					<?php }}?>
					</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>