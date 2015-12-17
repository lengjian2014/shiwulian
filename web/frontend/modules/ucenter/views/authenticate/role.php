<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use common\components\FileUploaded;
use frontend\models\UserRole;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;padding:0px;padding-bottom:60px;">
					<div class="panel-group" id="roleaccordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="roleheadingOne">
					      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#rolecollapseOne" aria-expanded="true" aria-controls="rolecollapseOne">
					        <a class="collapsed">
					          种植户、养殖户
					        </a>
					      </h4>
					    </div>
					    <div id="rolecollapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="roleheadingOne">
					      <div class="panel-body" role-type='0'>
					      		<?php if(!empty($model) && isset($model[0])){
					      		 				echo $this->render("_roleview", ['model' => $model[0]]);
					      					}else{
					      						$model0 = new UserRole();
												$model0->role = 0;
												echo $this->render("_roleform", ['model' => $model0]);
					      					}?>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="roleheadingTwo">
					      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#rolecollapseTwo" aria-expanded="false" aria-controls="rolecollapseTwo">
					        <a class="collapsed">
					          加工企业
					        </a>
					      </h4>
					    </div>
					    <div id="rolecollapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="roleheadingTwo">
					      <div class="panel-body" role-type='1'>
					      		<?php if(!empty($model) && isset($model[1])){
					      		 				echo $this->render("_roleview", ['model' => $model[1]]);
					      					}else{
					      						$model1 = new UserRole();
												$model1->role = 1;
												echo $this->render("_roleform", ['model' => $model1]);
					      					}?>
					      </div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="roleheadingThree">
					      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#rolecollapseThree" aria-expanded="false" aria-controls="rolecollapseThree">
					        <a class="collapsed">
					          检疫检验
					        </a>
					      </h4>
					    </div>
					    <div id="rolecollapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="roleheadingThree">
					      <div class="panel-body" role-type='2'>
					      		<?php if(!empty($model) && isset($model[2])){
					      		 				echo $this->render("_roleview", ['model' => $model[2]]);
					      					}else{
					      						$model2 = new UserRole();
												$model2->role = 2;
												echo $this->render("_roleform", ['model' => $model2]);
					      					}?>
					      </div>
					    </div>
					  </div>
					   <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingFour">
					      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#rolecollapseFour" aria-expanded="false" aria-controls="rolecollapseFour">
					        <a class="collapsed">
					          运输保存
					        </a>
					      </h4>
					    </div>
					    <div id="rolecollapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="roleheadingFour">
					      <div class="panel-body" role-type='3'>
					      		<?php if(!empty($model) && isset($model[3])){
					      		 				echo $this->render("_roleview", ['model' => $model[3]]);
					      					}else{
					      						$model3 = new UserRole();
												$model3->role = 3;
												echo $this->render("_roleform", ['model' => $model3]);
					      					}?>
					      </div>
					    </div>
					  </div>
					   <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="roleheadingFives">
					      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#rolecollapseFives" aria-expanded="false" aria-controls="rolecollapseFives">
					        <a class="collapsed">
					          批发、销售
					        </a>
					      </h4>
					    </div>
					    <div id="rolecollapseFives" class="panel-collapse collapse" role="tabpanel" aria-labelledby="roleheadingFives">
					      <div class="panel-body" role-type='4'>
					      		<?php if(!empty($model) && isset($model[4])){
					      		 				echo $this->render("_roleview", ['model' => $model[4]]);
					      					}else{
												$model4 = new UserRole();
												$model4->role = 4;
					      						echo $this->render("_roleform", ['model' => $model4]);
					      					}?>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	</div>
<?php
    $script = <<<JS
	$(document).on("click", ".role-edit", function(){
		var role = $(this).parents(".panel-body").attr("role-type");
		var self = this;
		$.get("/ucenter/authenticate/rolecreate?role=" + role, {}, function(data){
			$(self).parents(".panel-body").html(data);
		});
	});
JS;
    $this->registerJs($script);
?> 