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
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;padding-top: 10px;">
					<div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;店铺信息</p></div>
					<p style="padding-top:8px;margin-bottom:40px;">
						<?php if($model->body == 0){?><a class="btn btn-success" type="buttom" style="float:right;margin-left:10px;" href="/ucenter/stores/enterprise">升级企业店铺</a><?php }?>
						<a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/stores/<?=$model->body == 0?'personal' : 'enterprise'?>">编辑</a>
					</p>
						<?= DetailView::widget([
							'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
								['attribute'=>'body', 'format'=>'html','value'=> $model->body == 0 ? '个人店铺' : '企业店铺'],
					            'title',
					            'summary',
					            'contacts',
								'address',
								'gps',
								'phone',
								'mobile',
								'email:email',
								'zipcode',
					        ],
					    ]) ?>
					    <?php if($model->body == 1){?>
					    <div class="right-sidebar-title" style="margin-bottom: 20px;margin-top:20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;企业信息</p></div>
						<?= DetailView::widget([
							'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
								'company',
					            ['attribute'=>'logo', 'format'=>'html','value'=> !empty($model->logo) ? Html::img(IMGURL . $model->logo, ['style'=>['width' => "50%"], 'alt'=>'', 'title'=>'', 'class' => "thumbnail-img"]) : ''],
					            'website',
					        ],
					    ]) ?>
					    <?php }?>
					    <div class="right-sidebar-title" style="margin-bottom: 20px;margin-top:20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;认证信息</p></div>
						<?= DetailView::widget([
							'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
								'type',
								'credentials',
								'apply',
								'numbering',
								['attribute'=>'picture', 'format'=>'html','value'=> !empty($model->picture) ? Html::img(IMGURL . $model->picture, ['style'=>['width' => "50%"], 'alt'=>'', 'title'=>'', 'class' => "thumbnail-img"]) : ''],
					        ],
					    ]) ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>