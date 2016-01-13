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
				<div class="ucenter-content panel-content" style="min-height:550px;padding-top: 10px;">
					<div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;合作产品</p></div>
<!-- 					<div class="row" style="padding: 10px 15px;margin:0px;text-align:right;">
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 搜索合作产品</button> -->
<!-- 				  	</div> -->
				  	<div class="row" style="padding: 10px 15px;margin:0px;">
						<table class="table table-hover">
							<thead>
								<tr>
									<th width="10%">#</th>
									<th width="50%">产品名称</th>
									<th width="15%">我的角色</th>
									<th width="15%">审核状态</th>
									<th width="10%">操作</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>正宗秭归纽荷尔脐橙5斤 买2件送精美水果刀 新鲜采摘水果新鲜橙子</td>
									<td>批发零售</td>
									<td>正在审核</td>
									<td><a>取消合作</a></td>
								</tr>
							</tbody>
						</table>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>