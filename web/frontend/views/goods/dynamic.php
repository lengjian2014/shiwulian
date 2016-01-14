<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
if(!empty($dynamic)){foreach ($dynamic as $k => $v){?>
<div class="row main">
	<div class="col-xs-12 col-sm-12" style="padding-bottom:10px;border-bottom-color: #ddd;border-bottom-style: solid;border-bottom-width: 1px;">
		<h4><a href="">moleng</a></h4> 
		<p><a href="" style="padding-right: 10px;">食品原料 - 种源</a> <?=Html::encode($v['content'])?></p>
		<div class="row" style="margin-bottom: 15px;">
			<?=!empty($v['file']) ? implode("", Dynamic::formatFile($v['file'], "col-xs-6 col-sm-3 img-box-row")) : '';?>
		</div>
		<div class="content-foot">
			<span><small><?=date("Y/m/d", $v['addtime'])?></small></span>
			<div class="content-foot-ext" style="float: right;">
				<span><a>评论(<?=Html::encode($v['comment'])?>)</a></span>
				<span><a>点赞(<?=Html::encode($v['like'])?>)</a></span>
				<span><a>浏览(<?=Html::encode($v['scan'])?>)</a></span>
			</div>
		</div>
	</div>
</div>
<?php }}?>