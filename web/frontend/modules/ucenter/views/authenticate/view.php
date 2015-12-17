<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use common\components\FileUploaded;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;padding-top:0px;">
					<ul id="myTabs" class="nav nav-tabs" role="tablist">
							<li class="<?=$model->type == 0 ? 'active' : ''?>" role="presentation">
								<a id="home-tab" aria-expanded="true" aria-controls="home" href="/ucenter/authenticate/realname">实名认证</a>
							</li>
							<li class="<?=$model->type == 1 ? 'active' : ''?>" role="presentation">
								<a id="profile-tab" aria-controls="profile" href="/ucenter/authenticate/enterprise" aria-expanded="false">企业认证</a>
							</li>
					</ul>
					<div id="myTabContent" class="tab-content">
							<div id="home" class="tab-pane fade <?=$model->type == 0 ? 'active in' : ''?>" aria-labelledby="home-tab" role="tabpanel" style="padding-left:20px;">
								<p style="padding-top:8px;margin-bottom:40px;"><a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/authenticate/realname?edit=1">编辑</a></p>
								<?= DetailView::widget([
									'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
							        'model' => $model,
							        'attributes' => [
							            'category',
										['label'=>'真实姓名','value'=> $model->name],
										'number',
										['attribute'=>'picture', 'format'=>'html', 'value'=> FileUploaded::formatImgView($model->picture)],
										['attribute'=>'addtime','value'=>date("Y-m-d",$model->addtime)],
										['attribute'=>'updatetime','value'=>date("Y-m-d",$model->updatetime)],
										['attribute'=>'status','value'=> empty($model->status) ? '未审核' : ($model->status==1 ? '审核通过' : '审核未通过')],
							        ],
							    ]) ?>
							</div>
							<div id="profile" class="tab-pane fade <?=$model->type == 1 ? 'active in' : ''?>" aria-labelledby="profile-tab" role="tabpanel" style="padding-left:20px;">
								<p style="padding-top:8px;margin-bottom:40px;"><a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/authenticate/enterprise?edit=1">编辑</a></p>
								<?= DetailView::widget([
									'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
							        'model' => $model,
							        'attributes' => [
							            'category',
										['label'=>'法人姓名','value'=> $model->name],
										'number',
										['attribute'=>'picture', 'format'=>'html', 'value'=> FileUploaded::formatImgView($model->picture)],
										['attribute'=>'addtime','value'=>date("Y-m-d",$model->addtime)],
										['attribute'=>'updatetime','value'=>date("Y-m-d",$model->updatetime)],
										['attribute'=>'status','value'=> empty($model->status) ? '未审核' : ($model->status==1 ? '审核通过' : '审核未通过')],
							        ],
							    ]) ?>
						</div>
					</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	</div>