<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row panel-content site-signup">
      	<div class="col-xs-12 col-sm-7"></div>
	      <div class="col-xs-12 col-sm-5">
	      		<?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' =>['style' => "padding:20px 15px 30px 15px;margin:35px 20px;", 'class' => "panel-content"]]); ?>
	      			<div style="padding-bottom:15px;">
							<p style="font-size:20px;color:#848484;">注册</p>
							<div style="height: 1px; overflow: hidden; background: transparent url(/images/isay24.png) no-repeat scroll -1670px 0px;width:100%"></div>
				      </div>
					 <?= $form->field($model, 'username')->textInput(['placeholder' => $model->attributeLabels()['username']])->label('')?>
					 
					 <?= $form->field($model, 'email')->textInput(['placeholder' => $model->attributeLabels()['email']])->label('')?>
					  
					  <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->attributeLabels()['password']])->label('')?>
					  
					  <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => $model->attributeLabels()['password_repeat']])->label('')?>
					  
					  <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
					  	<div class="form-group" style="padding-top:10px;">
					        <div style="padding-top:5px;">
								<p style="font-size:13px;color:#848484;">已经注册账号，<a>登录</a><a style="color: #848484;font-size: 12px;float:right;" href="/index.php?s=/home/user/mi.html">忘记密码？</a></p>
					         </div>
			        	</div>		
				<?php ActiveForm::end(); ?>
		      </div>
	</div>