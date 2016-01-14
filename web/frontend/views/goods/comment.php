<?php 
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use frontend\models\GoodsCommentReply;
?>
<?php if(!empty($comment)){foreach ($comment as $k => $item){?>
<div class="main comment-content" style="background-color: #fff;border-bottom-color: #ddd;border-bottom-style: solid;border-bottom-width: 1px;padding-bottom:10px;margin-bottom:20px;">
	<div class="content-thumbnail" style="float:left;">
		<a href="#"><img data-holder-rendered="true" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE5ZjU0Yzk0ZiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTlmNTRjOTRmIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9Ijc0LjgiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" style="width: 64px; height: 64px;" data-src="holder.js/64x64" alt="64x64"></a>	
	</div>
	<div style="padding-left:80px;">
		<h4><small><a>Subtext for header</a></small></h4>
		<p><?=Html::encode($item['content'])?></p>
		<p style="padding:10px 0px 5px 0px;">
			<span style="font-size:12px;float: left;"><?=date("Y-m-d H:i", $item['addtime'])?></span>
			<span style="font-size:12px;float: right;padding-left:15px;"><a href="javascript:;" onclick="comment(this, <?=$item['uid']?>, <?=$item['id']?>, 'molemn')">回复</a></span>
			<span style="font-size:12px;float: right;padding-left:15px;">点赞(<?=Html::encode($item['like'])?>)</span>
		</p>
	</div>
	<?php if(!empty($item['replaycontent'])){foreach ($item['replaycontent'] as $key => $v){?>
	<div class="main" style="margin-left:80px;clear:both;margin-top:20px;">
		<div style="float:left;">
			<a href="#"><img data-holder-rendered="true" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE5ZjU0Yzk0ZiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTlmNTRjOTRmIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9Ijc0LjgiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" style="width: 64px; height: 64px;" data-src="holder.js/64x64" alt="64x64"></a>
		</div>
		<div style="padding-left:80px;">
			<h4><small><a>moleng</a> 回复 <a>Subtext for header</a></small></h4>
			<p><?=Html::encode($v['content'])?></p>
			<p style="padding:10px 0px 5px 0px;">
				<span style="font-size:12px;float: left;"><?=date("Y-m-d H:i", $v['addtime'])?></span>
				<span style="font-size:12px;float: right;padding-left:15px;"><a href="javascript:;" onclick="comment(this, <?=$v['uid']?>, <?=$item['id']?>, 'molemn')">回复</a></span>
				<span style="font-size:12px;float: right;padding-left:15px;">点赞(<?=Html::encode($v['like'])?>)</span>
			</p>
		</div>
	</div>
	<?php }}?>
</div>
<?php }}?>
<div class="row">
	<?php $form = ActiveForm::begin(); ?>
	  <div class="col-lg-10">
	    <div class="input-group">
	     <?= $form->field($model, 'content')->textarea(['rows' => 4])->label('')?>
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit" style="padding:45px 20px;">提交</button>
	      </span>
	    </div>
	  </div>
	  <?php ActiveForm::end(); ?>
</div>
<div class="comment-reply row" style="margin-left:80px;clear:both;margin-top:20px;display:none;">
	<?php $model_reply = new GoodsCommentReply();$form = ActiveForm::begin(['action' => '/goods/reply?gid=' . $item['goods_id']]); ?>
	<div style="display: none;">
		<?= $form->field($model_reply, 'reply_id')?>
		<?= $form->field($model_reply, 'comment_id')?>
	</div>
	  <div class="col-lg-12">
	    <div class="input-group">
	     <?= $form->field($model_reply, 'content')->textarea(['rows' => 4])->label('')?>
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit" style="padding:45px 20px;">提交</button>
	      </span>
	    </div>
	  </div>
	  <?php ActiveForm::end(); ?>
</div>
<?php
$script = <<<JS
	function comment(obj, reply_id, comment_id, nickname)
	{
		$(obj).parents(".comment-content").find(".comment-reply").remove();
		$(obj).parents(".comment-content").append($(".comment-reply").clone().show());
		$(obj).parents(".comment-content").find("#goodscommentreply-content").val('').attr('placeholder', "@ " + nickname);
		$(obj).parents(".comment-content").find("#goodscommentreply-reply_id").val(reply_id);
		$(obj).parents(".comment-content").find("#goodscommentreply-comment_id").val(comment_id);
	}
JS;
    $this->registerJs($script);
?> 