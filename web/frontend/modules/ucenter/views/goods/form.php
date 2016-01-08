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
<style>
.field-goods-links .form-group {
	padding-left:15px;
	padding-right:15px;
}
</style>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb panel-default">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">商品管理</a></li>
				  <li class="active"><?=$model->isNewRecord ? Yii::t('app', '新增') : Yii::t('app', '修改')?></li>
				</ol>
				<div class="ucenter-content panel-content">
					<div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;产品信息</p></div>
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
						
						    <?= $form->field($model, 'classify')->widget(Select2::className(), [
							    			'data' => ["水果" => ['1' => "苹果", '2' => "香蕉"]],
								    		'options' => ['placeholder' => 'Select a state ...'],
								    		'pluginOptions' => [
								    			'allowClear' => true
							    			],
									])?>
						
						    <?= $form->field($model, 'summary')->textarea(['rows' => 5])?>
						    
						    <?= $form->field($model, 'picture[]')->widget(FileInput::className(), [
						    				'data' => $model->picture,
											'language' => 'zh-CN',
										    'options' => ['multiple' => true, 'accept' => 'image/*'],
										    'pluginOptions' => [
															'previewFileType' => 'any', 
															'uploadUrl' => Url::to(['/site/upload']), 
															'showUpload'=>true, 
														    'initialPreview'=> $picture, 
														    'overwriteInitial' => false]
								]); ?>
						    
						    <?= $form->field($model, 'tags')->widget(Select2::className(), [
										'value' => $model->soldarea, // initial value
										'data' => ArrayHelper::map(Areas::getAreasByParentId(0), 'id', 'name'),
										'options' => ['placeholder' => '选择标签...', 'multiple' => true],
										'pluginOptions' => [
												'allowClear' => true,
												'tags' => true,
												'maximumInputLength' => 5
										],
									])?>
						    
							<?//= $form->field($model, 'price')->widget(MaskMoney::className(), [
// 							    		'pluginOptions' => [
// 								    		'prefix' => '￥ ',
// 								    		'suffix' => ' 元',
// 								    		'allowNegative' => false
// 							    		]
// 						    		//]) ?>
							
						    <?//= $form->field($model, 'market_price')->widget(MaskMoney::className(), [
// 							    		'pluginOptions' => [
// 								    		'prefix' => '￥ ',
// 								    		'suffix' => ' 元',
// 								    		'allowNegative' => false
// 							    		]
// 						    		//]) ?>
						    		
						    <?//= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>
						
						    <?//= $form->field($model, 'weight')->textInput() ?>
						
						    <?//= $form->field($model, 'inventory')->textInput() ?>
						
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
															$("select#goods-place-city").html("<option value=\"\">市</option>");
															$("select#goods-place-county").html("<option value=\"\">区、县</option>");
												            $.post("/classify/city?pid='.'"+$(this).val(),function(data){
												                $("select#goods-place-city").html(data);
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
														$("select#goods-place-county").html("<option value=\"\">区、县</option>");
												      	$.post("/classify/county?pid='.'"+$(this).val(),function(data){
												                $("select#goods-place-county").html(data);
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
						
							<div class="links-content">
								<?php if(empty($model->links)){?>
								<div class="form-group field-goods-links">
									<label class="col-lg-2 control-label" for="goods-links">友情链接</label>
									<div class="col-lg-4">
										<?= $form->field($model, 'links[name][]', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->textInput(['placeholder' => "链接标题"]) ?>
									</div>
									<div class="col-lg-4">
										<?= $form->field($model, 'links[url][]', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->textInput(['placeholder' => "链接地址"]) ?>
									</div>
									<div class="col-lg-1">
										<div class="form-group">
											<button class="btn btn-success links-add" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
										</div>
									</div>
								</div>
								<?php }else{ foreach ($model->links['name'] as $k => $v){?>
								<div class="form-group field-goods-links">
									<label class="col-lg-2 control-label" for="goods-links"><?=$k==0? '友情链接' : ''?></label>
									<div class="col-lg-4">
										<?= $form->field($model, 'links[name]['.$k.']', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->textInput(['placeholder' => "链接标题"]) ?>
									</div>
									<div class="col-lg-4">
										<?= $form->field($model, 'links[url]['.$k.']', ['template' => "<div class=\"control-group\">{input}</div>{error}\n"])->textInput(['placeholder' => "链接地址"]) ?>
									</div>
									<div class="col-lg-1">
										<div class="form-group">
										<?php if($k==0){?>
											<button class="btn btn-success links-add" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
										<?php }else{?>	
											<button class="btn btn-danger links-delect" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
										<?php }?>	
										</div>
									</div>
								</div>
								<?php }}?>
							</div>
							
						    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
						    
						    <?//= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
						    <?= $form->field($model, 'detail')->widget(\xj\ueditor\Ueditor::className(), [
							    'style' => 'width:100%;height:350px',
							    'renderTag' => true,
							    'readyEvent' => "",
							    'jsOptions' => [
									'toolbars'=> [
										[
											'fullscreen', 'source', '|', 'undo', 'redo', '|',
											'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
											'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
											'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
											'directionalityltr', 'directionalityrtl', 'indent', '|',
											'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
											'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
											'simpleupload', 'insertimage', 'emotion', 'template', 'background', '|',
											'preview'
										]
									],
							        'serverUrl' => yii\helpers\Url::to(['upload']),
									'maximumWords' => 100000,
							        'autoHeightEnable' => true,
							        'autoFloatEnable' => true,
									'enableAutoSave ' => false
							    ],
							])?>
						
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
<?php
$script = <<<JS
	$(document).on("click", ".links-add", function(){
		$(this).parents(".field-goods-links").clone(true).appendTo(".links-content");
		$(".links-content").find(".control-label").last().html('');
		$(".links-content").find(".field-goods-links").last().find("input").val('');
		$(".links-content").find(".col-lg-1 > .form-group").last().html('<button class="btn btn-danger links-delect" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>');
	});
	$(document).on("click", ".links-delect", function(){
		$(this).parents(".field-goods-links").remove();
	});
	$(document).on("click", ".kv-file-remove", function(){
		$(this).parents(".file-preview-frame").remove();
	})
JS;
    $this->registerJs($script);
?> 