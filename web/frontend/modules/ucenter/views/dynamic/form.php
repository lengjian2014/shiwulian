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
				  <li><a href="#">产品动态</a></li>
				  <li class="active">新建</li>
				</ol>
				<div class="ucenter-content panel-content">
					    <?php $form = ActiveForm::begin([
													      	'id' => 'update-form',
					    									'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
													        'fieldConfig' => [
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>

							<?= $form->field($model, 'goods_id')->dropDownList($goods,['prompt'=>'选择发布的产品...'])?>
							 
						    <?//= $form->field($model, 'series_id')->textInput() ?>
						
							<?= $form->field($model, 'classify_id')->dropDownList(Yii::$app->params['classify'],['prompt'=>'选择动态类别...'])?>
						
						    <?= $form->field($model, 'content')->textarea(['rows' => 5]) ?>
						
							<?= $form->field($model, 'file[]')->widget(FileInput::className(), [
						    				'data' => $model->file,
											'language' => 'zh-CN',
										    'options' => ['multiple' => true, 'accept' => 'image/*'],
										    'pluginOptions' => [
															'previewFileType' => 'any', 
															'uploadUrl' => Url::to(['/site/upload']), 
															'showUpload'=>true, 
														    'initialPreview'=> $picture, 
														    'overwriteInitial' => false]
								]); ?>
								
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