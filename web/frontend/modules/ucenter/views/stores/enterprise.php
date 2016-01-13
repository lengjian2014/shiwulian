<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\Areas;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\Url;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">店铺管理</a></li>
				  <li><a href="#">店铺设置</a></li>
				  <li class="active">企业店铺</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;padding-top: 10px;">
					    <div class="right-sidebar-title" style="margin-bottom: 20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;企业店铺</p></div>
					    <?php $form = ActiveForm::begin([
													      	'id' => 'update-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>
						
						<?//= $form->field($model, 'body')->textInput() ?>

					    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'summary')->textarea(['rows' => 3])?>
					
					    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
					
						<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>					    
					
					    <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>

					    <div class="right-sidebar-title" style="margin-bottom: 20px;margin-top:20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;企业信息</p></div>
						
					    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
					    
					    <?= $form->field($model, 'logo')->widget(FileInput::className(), [
											'language' => 'zh-CN',
										    'pluginOptions' => [
													'previewFileType' => 'any', 
													'uploadUrl' => Url::to(['/site/file-upload']), 
													'showUpload'=>true,
													'initialPreview'=> $logo,
													'overwriteInitial' => false,
											]
								]); ?>
					
					    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
										
					    <div class="right-sidebar-title" style="margin-bottom: 20px;margin-top:20px;"><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;认证信息</p></div>
						
						<?= $form->field($model, 'type')->dropDownList(Yii::$app->params['certificate'], ['prompt'=>'选择证件类型...',]) ?>
						
					    <?= $form->field($model, 'credentials')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'apply')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'numbering')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'picture')->widget(FileInput::className(), [
											'language' => 'zh-CN',
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
					        	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					        	<?= Html::a(Yii::t('app', '取消'), ['index'], ['class' => 'btn btn-default']) ?>
					        </div>	
					    </div>
					
					    <?php ActiveForm::end(); ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
