<?php 
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
$this->beginContent('@app/views/layouts/layout.php'); 
?>
	
	<div class="jumbotron">
		<div class="container">
			<div class="row search">
			  <div class="col-xs-12 col-lg-9">
				<div class="search-content">
					<p style="margin-bottom:0px;padding-left:10px;font-size:14px;"><span>动态</span><span style="padding-left:20px;">产品</span><span style="padding-left:20px;">商家</span></p>
					<div class="input-group">
					  <input type="text" class="form-control input-lg" placeholder="Search for...">
					  <span class="input-group-btn">
						<button class="btn btn-default input-lg" type="button">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					  </span>
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>
    
    <div class="container">
    	<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<?php $this->endContent(); ?>