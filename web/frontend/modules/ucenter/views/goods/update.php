<?php 
use yii\widgets\DetailView;
?>
      <div class="row">
		<div class="col-xs-12 col-sm-9">
				<ol class="breadcrumb">
				  <li><a href="#">个人中心</a></li>
				  <li><a href="#">账号设置</a></li>
				  <li class="active">详细</li>
				</ol>
				<div class="ucenter-content panel-content" style="padding:0px 20px 60px 20px;">
					    <?php $form = ActiveForm::begin(); ?>

						    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'resettoken')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'status')->textInput() ?>
						
						    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'role')->textInput() ?>
						
						    <?= $form->field($model, 'addtime')->textInput(['maxlength' => true]) ?>
						
						    <?= $form->field($model, 'updatetime')->textInput(['maxlength' => true]) ?>
						
						    <div class="form-group">
						        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
						    </div>
						
						    <?php ActiveForm::end(); ?>
				</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<?=$this->render("/widgets/leftbar")?>
		</div>
	  </div>
