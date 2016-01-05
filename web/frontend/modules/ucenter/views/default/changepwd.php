<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\Areas;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="min-height:550px;">
					    <?php $form = ActiveForm::begin([
													      	'id' => 'change-form',
					    									'enableAjaxValidation'=>true, 
					    									'enableClientValidation' => false,
					    									'options' => ['class' => 'form-horizontal'],
													        'fieldConfig' => [  
													            'template' => "{label}\n<div class=\"col-lg-9\"><div class=\"control-group\">{input}</div>{error}</div>\n",  
													            'labelOptions' => ['class' => 'col-lg-2 control-label'],  
													            'inputOptions' => ['class' => 'form-control']
													        ],
							]); ?>

						<?= $form->field($model, 'oldpassword')->passwordInput(['autocomplete' => "off"])?>
						
					   	<?= $form->field($model, 'password')->passwordInput()?>
					  
					  	<?= $form->field($model, 'password_repeat')->passwordInput()?>
					    					
					    <div class="form-group">
					        <div class="col-lg-offset-2 col-lg-10">
					        	<?= Html::submitButton('更改', ['class' => 'btn btn-primary']) ?>
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
	document.getElementById('changepasswordform-oldpassword').value='';   
JS;
$this->registerJs($script);
?>