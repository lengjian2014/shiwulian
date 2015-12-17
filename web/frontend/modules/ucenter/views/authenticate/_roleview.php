<?php 
use yii\widgets\DetailView;
use common\components\FileUploaded;
?>

<p style="margin-bottom:40px;"><a class="btn btn-default role-edit" type="buttom" style="float:right;" href="javascript:;">编辑</a></p>
	<?= DetailView::widget([
			'template' => "<tr><th width='20%'>{label}</th><td width='80%'>{value}</td></tr>",	
			'model' => $model,
			'attributes' => [
					'type',
					'number',
					['attribute'=>'picture', 'format'=>'html', 'value'=> FileUploaded::formatImgView($model->picture)],
					['attribute'=>'addtime','value'=>date("Y-m-d",$model->addtime)],
					['attribute'=>'updatetime','value'=>date("Y-m-d",$model->updatetime)],
					['attribute'=>'status','value'=> empty($model->status) ? '未审核' : ($model->status==1 ? '审核通过' : '审核未通过')],
			],
	]) ?>