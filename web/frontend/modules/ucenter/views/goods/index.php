<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding-top: 0px;">
					<div class="row" style="padding: 10px 15px;margin:0px;border-bottom-color: #e9e9e9;border-bottom-style: solid;border-bottom-width: 1px;">
				  		<div class="btn-group" data-toggle="buttons" style="float:left;">
					  		  <label class="btn btn-default active">
							    <input type="radio" name="options" id="option1" autocomplete="off" checked><span class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true"></span> 最新
							  </label>	
							  <label class="btn btn-default">
							    <input type="radio" name="options" id="option1" autocomplete="off"><span class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true"></span> 动态最新
							  </label>
							  <label class="btn btn-default">
							    <input type="radio" name="options" id="option2" autocomplete="off"> 放心指数
							  </label>
							  <label class="btn btn-default">
							    <input type="radio" name="options" id="option3" autocomplete="off"> 追溯数
							  </label>
							  <label class="btn btn-default">
							    <input type="radio" name="options" id="option3" autocomplete="off"> 浏览量
							  </label>
							  <label class="btn btn-default">
							    <input type="radio" name="options" id="option3" autocomplete="off"> 评论数
							  </label>
						</div>
				  	</div>
				  <?php if(!empty($model)){foreach ($model as $k => $v){?>
					<div class="row main" style="margin-left:0px;margin-right:0px;margin-bottom:10px;padding-top:20px;border-bottom-color: #e9e9e9;border-bottom-style: solid;border-bottom-width: 1px;">
						<div class="col-xs-3 col-sm-3">
								<a href="#">
									<img width="100%" src="<?php $picture=explode("|", $v['picture']); echo IMGURL . $picture[0];?>" alt="100%x180">
								</a>
						</div>
						<div class="col-xs-9 col-sm-9">
							<h4><?=Html::encode($v['title'])?></h4>
							<p style="font-size:12px;color:#9d9d9d"><?=Html::encode($v['summary'])?></p>
							<p style=" margin-bottom: 1px;">
								<span><small>产品分类：水果</small></span><span style="padding-left:20px;"><small>浏览次数：</small><?=intval($v['scan'])?></span><span style="padding-left:20px;"><small>追溯次数：</small><?=intval($v['trace'])?></span><span style="padding-left:20px;"><small>评论次数：</small><?=intval($v['comments'])?></span>
							</p>
							<p style=" margin-bottom: 1px;">
								<span><small>放心指数：</small><i style="color:red;font-size:20px;"><?=$v['score']?></i></span>
							</p>
						</div>
						<div class="col-xs-12 col-sm-12" style="padding:10px 20px;">
							<?php foreach (Yii::$app->params['noderole'] as $key => $val){?>
								<span style="padding-right:20px;"><small>养殖户：<a><?=isset($role[$v['id']][$key]) && !empty($role[$v['id']][$key]) ? implode('&nbsp;', $role[$v['id']][$key]) : '<a>未设置</a>'?></a></small></span>
							<?php }?>
							<a style="margin-left:5px;float:right;" class="btn-danger btn-xs">关闭</a><a href="/ucenter/goods/update/<?=$v['id']?>" style="float:right;" class="btn-info btn-xs">编辑</a>
						</div>
					</div>
					<?php }}?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>