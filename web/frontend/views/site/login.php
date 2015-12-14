<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row panel-content site-login">
      	<div class="col-xs-12 col-sm-7"></div>
	      <div class="col-xs-12 col-sm-5">
	      		<?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' =>['style' => "padding:20px 15px 30px 15px;margin:35px 20px;", 'class' => "panel-content"]]); ?>
	      			<div style="padding-bottom:15px;">
							<p style="font-size:20px;color:#848484;">登录</p>
							<div style="height: 1px; overflow: hidden; background: transparent url(/images/isay24.png) no-repeat scroll -1670px 0px;width:100%"></div>
				      </div>
					 <?= $form->field($model, 'username')->textInput(['placeholder' => $model->attributeLabels()['username']])->label('')?>
					 					  
					  <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->attributeLabels()['password']])->label('')?>
					  
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> 记住一周
					    </label>
					  </div>
					  
					  <?= Html::submitButton('登录', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
					  
					  <div class="form-group" style="padding-top:10px;">
					        <div style="padding-top:5px;">
								<p style="font-size:13px;color:#848484;">没有账号？<a>注册</a> 一个 <a style="color: #848484;font-size: 12px;float:right;" href="/index.php?s=/home/user/mi.html">忘记密码？</a></p>
					         </div>
					        <div style="float:right;">
					         	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
								<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				         </div>
			      </div>
				<?php ActiveForm::end(); ?>
		</div>
</div>