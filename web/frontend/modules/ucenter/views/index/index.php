<?php 
use yii\widgets\DetailView;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content">
					<p style="padding-top:8px;margin-bottom:40px;"><a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/default/update">编辑</a></p>
						<?= DetailView::widget([
							'template' => "<tr><th>{label}</th><td>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
					            //'uid',
					            'username',
					            'email:email',
					            'mobile',
								'nickname',
								'gender',
								'birthday',
								'hometown',
								'qq',
								'address',
								['attribute'=>'addtime','value'=>date("Y-m-d",$model->addtime)],
					            //'updatetime',
					        ],
					    ]) ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
