<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use frontend\models\Areas;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding:40px 20px 60px 20px;">
					    <?php $form = ActiveForm::begin([
													      	'id' => 'update-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>

							<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true]) ?>
						
							<?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'classify')->textInput() ?>
						
						    <?= $form->field($model, 'summary')->textarea(['rows' => 5])?>
						
						    <?//= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>
						    <?= $form->field($model, 'picture[]')->widget(FileInput::className(), [
											'language' => 'zh-CN',
										    'options' => ['multiple' => true],
										    'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/site/file-upload']), 'showUpload'=>true]
								]); ?>

							<?= $form->field($model, 'price')->widget(MaskMoney::className(), [
							    		'pluginOptions' => [
								    		'prefix' => '￥ ',
								    		'suffix' => ' 元',
								    		'allowNegative' => false
							    		]
						    		]) ?>
							
						    <?= $form->field($model, 'market_price')->widget(MaskMoney::className(), [
							    		'pluginOptions' => [
								    		'prefix' => '￥ ',
								    		'suffix' => ' 元',
								    		'allowNegative' => false
							    		]
						    		]) ?>
						    		
						    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>
						
						    <?//= $form->field($model, 'weight')->textInput() ?>
						
						    <?= $form->field($model, 'inventory')->textInput() ?>
						
						    <?//= $form->field($model, 'sales')->textInput() ?>
						    
						    <?= $form->field($model, 'soldarea')->widget(Select2::className(), [
										'value' => $model->soldarea, // initial value
										'data' => ArrayHelper::map(Areas::getAreasByParentId(0), 'id', 'name'),
										'options' => ['placeholder' => '选择销售区域...', 'multiple' => true],
										'pluginOptions' => [
												'allowClear' => true,
												'tags' => true,
												'maximumInputLength' => 10
										],
									])?>
							<div class="form-group field-userexpand-province">
								<label class="col-lg-2 control-label" for="userexpand-province">产品产地</label>
								<div class="col-lg-3">
									<?= $form->field($model, 'place[province]', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(
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
									<?php $city = Areas::getAreasByParentId($model->place['province']);?>
									<?= $form->field($model, 'place[city]', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(
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
									<?php $county = Areas::getAreasByParentId($model->place['city']);?>
									<?= $form->field($model, 'place[county]', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->dropDownList(ArrayHelper::map( empty($county) ?[] : $county, 'id', 'name'),['prompt'=>'区、县']) ?>
								</div>
							</div>
						    <?//= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>
							
							<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
						    
						    <?//= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
						    
						    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
						
						    <div class="form-group">
					        	<div class="col-lg-offset-2 col-lg-10">
						        	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
						    	</div>
						    </div>	
						
						    <?php ActiveForm::end(); ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
