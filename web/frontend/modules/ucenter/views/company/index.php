<?php 
use yii\widgets\DetailView;
use frontend\models\Areas;
use yii\helpers\Html;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">企业管理</a></li>
				  <li><a href="#">企业设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;">
					<p style="padding-top:8px;margin-bottom:40px;"><a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/company/update">编辑</a></p>
						<?= DetailView::widget([
							'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
								'id',
								'uid',
								'company',
								['attribute'=>'logo', 'format'=>'html','value'=> !empty($model->logo) ? Html::img(IMGURL . $model->logo, ['style'=>['width' => "50%"], 'alt'=>'', 'title'=>'', 'class' => "thumbnail-img"]) : ''],
								'introduction',
								'website',
								'address',
								//['attribute'=>'addtime','value'=> !empty($model->addtime) ? date("Y-m-d",$model->addtime) : ''],
					            //'updatetime',
					        ],
					    ]) ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
