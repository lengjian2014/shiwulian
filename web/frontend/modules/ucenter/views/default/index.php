<?php 
use yii\widgets\DetailView;
use frontend\models\Areas;
use yii\helpers\Html;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding:0px 20px 60px 20px;min-height:550px;">
					<p style="padding-top:8px;margin-bottom:40px;"><a class="btn btn-default" type="buttom" style="float:right;" href="/ucenter/default/update">编辑</a></p>
						<?= DetailView::widget([
							'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
					        'model' => $model,
					        'attributes' => [
					            //'uid',
					            'nickname',
					            //'username',
					            //'email:email',
								['attribute'=>'email', 'format'=>'html','value'=> empty($model->email) ? Html::a("绑定邮箱", '', ['style'=>"font-size:12px;"]) : Html::encode($model->email) ." ". Html::a("更改邮箱", '', ['style'=>"font-size:12px;"])],
								['attribute'=>'mobile', 'format'=>'html','value'=> empty($model->mobile) ? Html::a("绑定手机号", '', ['style'=>"font-size:12px;"]) : Html::encode($model->mobile) ." ". Html::a("更改手机号", '', ['style'=>"font-size:12px;"])],
					            //'mobile',
								['attribute'=>'gender','value'=> empty($model->gender) ? '男' : '女'],
								['attribute'=>'birthday','value'=>date("Y",$model->birthday).'年'.date("m",$model->birthday).'月'.date("d",$model->birthday).'日'],
								'qq',
								['label'=>'联系地址','value'=> Areas::getNameById($model->province) ." ". Areas::getNameById($model->city) ." ". Areas::getNameById($model->county)],
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
