<?php 
use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
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
						<?php if($model->type){?>	
							<div id="profile" class="tab-pane fade active in" aria-labelledby="profile-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;">
						<?php }else{?>	
							<div id="home" class="tab-pane fade active in" aria-labelledby="home-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;">
						<?php }?>	
							<?php $form = ActiveForm::begin([
													      	'id' => 'personal-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
								]); ?>
								
							    <?//= $form->field($model, 'type')->textInput() ?>
							    
							    <?= $form->field($model, 'name')->textInput()->label($model->type ? "法人姓名" : "真实姓名") ?>
							
							    <?= $form->field($model, 'category')->dropDownList($category, ['prompt'=>'选择证件类型...',]) ?>
							
							    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'picture[]')->widget(FileInput::className(), [
											'language' => 'zh-CN',
										    'options' => ['multiple' => true],
										    'pluginOptions' => [
													'previewFileType' => 'any', 
													'uploadUrl' => Url::to(['/site/file-upload']), 
													'showUpload'=>true,
													'initialPreview'=> $picture,
													'overwriteInitial' => false,
											]
								]); ?>
								
							    <div class="form-group">
						        	<div class="col-lg-offset-2 col-lg-10">
							        	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '保存') : Yii::t('app', '更改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
							    	</div>
						    	</div>	
						    <?php ActiveForm::end(); ?>
							</div>
						</div>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	</div>