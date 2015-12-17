<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use common\components\FileUploaded;
?>
<?php $form = ActiveForm::begin([
								//'id' => 'farmers-form',
								'action' => "/ucenter/authenticate/rolecreate?role=" . $model->role,
					    		'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
								'fieldConfig' => [  
										'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
										'labelOptions' => ['class' => 'col-lg-2 control-label'],  
										'inputOptions' => ['class' => 'form-control']
								],
	]); ?>
								
	<div style="display: none;"><?= $form->field($model, 'role')->textInput() ?></div>

	<?= $form->field($model, 'type')->textInput() ?>
								
	<?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
								
	<?= $form->field($model, "picture[{$model->role}]")->widget(FileInput::classname(),  [
			'options' => ['accept' => 'image/*'],
    		'pluginOptions' => [
					'previewFileType' => 'image', 
					'showUpload'=>false,
					'initialPreview'=> [FileUploaded::formatImg($model->picture, "UserRole[picture][{$model->role}]")],
				]
		]);?>
	
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', '保存') : Yii::t('app', '更改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>	
<?php ActiveForm::end(); ?>