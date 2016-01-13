<?php 
use yii\widgets\DetailView;
use frontend\models\Areas;
use yii\helpers\Html;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">店铺管理</a></li>
				  <li><a href="#">店铺设置</a></li>
				  <li class="active">新建</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-xs-12 col-sm-4" style="text-align: center;padding-top:90px;"><a class="btn btn-default" href="/ucenter/stores/personal" role="button" style="padding:30px 70px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 个人店铺</a></div>
						<div class="col-xs-12 col-sm-4" style="text-align: center;padding-top:90px;"><a class="btn btn-default" href="/ucenter/stores/enterprise" role="button" style="padding:30px 70px;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> 企业店铺</a></div>
						<div class="col-sm-2"></div>
					</div>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
