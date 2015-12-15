<?php 
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\Areas;
use yii\helpers\ArrayHelper;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding:40px 20px 60px 20px;min-height:550px;margin-bottom:20px;">
					    <?php $form = ActiveForm::begin([
													      	'id' => 'update-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>

					    <?//= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
					    
						<?= $form->field($userexpand, 'nickname')->textInput(['maxlength' => true]) ?>
						
					    <?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
					
					    <?//= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
					    					    
					    <?= $form->field($userexpand, 'gender')->dropDownList(['0' => '男', '1' => '女'],['prompt'=>'选择性别...'])?>
					    
					    <?= $form->field($userexpand, 'birthday')->textInput(['maxlength' => true]) ?>
					    					    
					    <?= $form->field($userexpand, 'qq')->textInput(['maxlength' => true]) ?>
					    
					    <?= $form->field($userexpand, 'telephone')->textInput(['maxlength' => true]) ?>
					    
					    <?//= $form->field($userexpand, 'hometown')->textInput(['maxlength' => true]) ?>
					    
					    <div class="form-group field-userexpand-province">
							<label class="col-lg-2 control-label" for="userexpand-province">联系地址</label>
							<div class="col-lg-3">
								<?= $form->field($userexpand, 'province', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(
												ArrayHelper::map(Areas::getAreasByParentId(0),'id','name'), 
												[
													'prompt'=>'省、直辖市',
													'onchange'=>'
														$("select#userexpand-city").html("<option value=\"\">市</option>");
														$("select#userexpand-county").html("<option value=\"\">区、县</option>");
											            $.post("/classify/city?pid='.'"+$(this).val(),function(data){
											                $("select#userexpand-city").html(data);
											            });',
												]
										) ?>
							</div>
							<div class="col-lg-3">
								<?php $city = Areas::getAreasByParentId($userexpand->province);?>
								<?= $form->field($userexpand, 'city', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(
										ArrayHelper::map( empty($city) ?[] : $city, 'id', 'name'),
										[
											'prompt'=>'市',
											'onchange'=>'
													$("select#userexpand-county").html("<option value=\"\">区、县</option>");
											      	$.post("/classify/county?pid='.'"+$(this).val(),function(data){
											                $("select#userexpand-county").html(data);
													});',
										]) ?>
							</div>
							<div class="col-lg-3">
								<?php $county = Areas::getAreasByParentId($userexpand->city);?>
								<?= $form->field($userexpand, 'county', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(ArrayHelper::map( empty($county) ?[] : $county, 'id', 'name'),['prompt'=>'区、县']) ?>
							</div>
						</div>

					    <?= $form->field($userexpand, 'address')->textInput(['maxlength' => true]) ?>
					
					    <div class="form-group">
					        <div class="col-lg-offset-2 col-lg-10">
					        	<?= Html::submitButton('更新', ['class' => 'btn btn-primary']) ?>
					        </div>	
					    </div>
					
					    <?php ActiveForm::end(); ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
