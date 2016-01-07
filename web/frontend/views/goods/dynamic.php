<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
if(!empty($dynamic)){foreach ($dynamic as $k => $v){?>
<div class="row main" style="padding-right:20px;margin-bottom:30px;">
<div>
	<h4><?=date("Y/m/d", $v['addtime'])?></h4>
	<p><?=Html::encode($v['content'])?></p>
	<div class="row">
		<?=implode("", Dynamic::formatFile($v['file'], "col-xs-6 col-sm-3 img-box-row"));?>
	</div>
	<div class="content-foot">
		<span><span class="glyphicon glyphicon-user" aria-hidden="true" style="color:#9d9d9d;font-size:10px;margin-right:3px;"></span><a href="">moleng</a><small>2015/11/15</small></span>
		<div class="content-foot-ext" style="float: right;">
			<span><a>评论(<?=Html::encode($v['comment'])?>)</a></span>
			<span><a>点赞(<?=Html::encode($v['like'])?>)</a></span>
			<span><a>浏览(<?=Html::encode($v['scan'])?>)</a></span>
		</div>
	</div>
</div>
</div>
<?php }}?>