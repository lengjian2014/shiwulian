<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
?>
<div class="row">
	<div class="col-xs-12 col-lg-9">
  	<!--<div class="row panel-content" style="margin:15px 0px;">
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164011.png" alt="..." class="img-rounded"></div>
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164036.png" alt="..." class="img-rounded"></div>
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164055.png" alt="..." class="img-rounded"></div>
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164124.png" alt="..." class="img-rounded"></div>
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164142.png" alt="..." class="img-rounded"></div>
  		<div class="col-xs-4 col-lg-2"><img src="images/20151117164142.png" alt="..." class="img-rounded"></div>
  	</div>  -->
  	<div class="panel-content" style="margin:0px 0px;margin-bottom: 15px;padding-top:10px;">
  		<table class="table">
			<tbody>
				<tr>
					<th scope="row" style="padding-left:15px;width:10%;color:#9d9d9d;border-top: none;">基本分类</th>
					<td style="border-top: none;">水果蔬菜</td>
					<td style="border-top: none;">粮油米面</td>
					<td style="border-top: none;">肉禽蛋类</td>
					<td style="border-top: none;">坚果干货</td>
					<td style="border-top: none;">水产海鲜</td>
					<td style="border-top: none;">其他农副产品</td>
				</tr>
				<tr>
					<th scope="row" style="padding-left:15px;width:10%;color:#9d9d9d">二级分类</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<th scope="row" style="padding-left:15px;width:10%;color:#9d9d9d">三级分类</th>
					<td>Larry</td>
					<td>the Bird</td>
					<td>@twitter</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
				</tr>
			</tbody>
		</table>
  	</div>
  	<div class="row panel-content" style="padding: 10px 15px;margin:0px 0px 15px 0px;">
  		<div class="btn-group" data-toggle="buttons" style="float:left;">
		  <label class="btn btn-default active">
		    <input type="radio" name="options" id="option1" autocomplete="off" checked><span class="glyphicon glyphicon-sort-by-attributes" aria-hidden="true"></span> 动态最新
		  </label>
		  <label class="btn btn-default">
		    <input type="radio" name="options" id="option2" autocomplete="off"> 放心指数
		  </label>
		  <label class="btn btn-default">
		    <input type="radio" name="options" id="option3" autocomplete="off"> 销量
		  </label>
		  <label class="btn btn-default">
		    <input type="radio" name="options" id="option3" autocomplete="off"> 评论数
		  </label>
		</div>
		<div class="btn-group" data-toggle="buttons" style="float:right;">
		  <label class="btn btn-default active">
		    <input type="radio" name="options" id="option1" autocomplete="off" checked> <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
		  </label>
		  <label class="btn btn-default">
		    <input type="radio" name="options" id="option2" autocomplete="off"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
		  </label>
		</div>
  	</div>
	<div class="row" style="padding-left:10px;padding-right:10px;">
		<?php if(!empty($goods)){foreach ($goods as $k => $item){?>
		<div class="col-xs-12 col-lg-3" style="padding-left:5px;padding-right:5px;">
			<div class="thumbnail">
			<div class="row">
				<div class="col-xs-5 col-lg-12">
					<img alt="100%x200" style="height: 200px; width: 100%; display: block;" src="<?php $picture=explode("|", $item['picture']); echo IMGURL . $picture[0];?>">
				</div>
				<div class="col-xs-7 col-lg-12">
				<div class="caption">
					<h4 style="margin-top:0px;height:70px;"><a href="#"><small><?=Html::encode($item['title'])?></small></a></h4>
					<p>
						<!--<span style="font-size:12px;float: right;padding-left:5px;"><a>追溯(34)</a></span>-->
						<span style="float: right;"><small>放心指数：</small><i style="color:red;font-size:20px;"><?=$item['score']?></i></span>
						<!--<span style="font-size:12px;float: right;padding-left:5px;"><a>评论(12)</a></span>-->
					</p>
				</div>
				</div>
			</div>
			</div>
		</div>
		<?php }}?>
	</div>
	</div>
	<div class="col-xs-12 col-lg-3">
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
</div>