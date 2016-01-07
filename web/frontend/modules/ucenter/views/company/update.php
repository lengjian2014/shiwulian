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
				  <li><a href="#">企业管理</a></li>
				  <li><a href="#">企业设置</a></li>
				  <li class="active">编辑</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;">
					    <?php $form = ActiveForm::begin([
													      	'id' => 'update-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>

					    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

					    <?= $form->field($model, 'logo')->widget(FileInput::className(), [
											'language' => 'zh-CN',
										    'pluginOptions' => [
													'previewFileType' => 'any', 
													'uploadUrl' => Url::to(['/site/file-upload']), 
													'showUpload'=>true,
													'initialPreview'=> $picture,
													'overwriteInitial' => false,
											]
								]); ?>
					
					    <?= $form->field($model, 'introduction')->textarea(['rows' => 4])?>
					
					    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
					
						<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
						
						<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
						
						<?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
						
					    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
					
					    <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>
					
					    <div class="form-group">
					        <div class="col-lg-offset-2 col-lg-10">
					        	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					        </div>	
					    </div>
					
					    <?php ActiveForm::end(); ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
