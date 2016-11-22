<?php $this->beginContent('@app/views/layouts/main.php');?>
<div class="wrap main-news">
    <div class="jumbotron">
      <div class="container">
        	<div class="row">
         		<div class="col-xs-12 col-md-6">
        			<span class="pull-left nav-logo">涉农网</span>
        			<span class="pull-left nav-logo-title"><i class="nav-point"></i>农业教程</span>
        		</div>
        		<div class="col-xs-12 col-md-6">
	        		<div class="input-group" style="line-height: 80px;">
				      <input type="text" class="sint" placeholder="请输入查询的关键字……">
				      <span class="input-group-btn"><button class="ssub" type="button">点击搜索</button></span>
				    </div>
			    </div>
        	</div>
      </div>
      <div class="container">
      	<div class="row">
         		<div class="col-md-12">
			      <nav class="navbar navbar-inverse navbar-static-top" style="min-height: 40px;">
					<div class="container">
						<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">首页</a></li>
							<li><a href="#about">最新资讯</a></li>
							<li><a href="#about">市场行情</a></li>
							<li><a href="#about">国际资讯</a></li>
							<li><a href="#about">地方资讯</a></li>
							<li><a href="#about">气象<i class="plate-point"></i>灾害</a></li>
							<li><a href="#about">食品安全</a></li>
							<li><a href="#about">科技<i class="plate-point"></i>机械</a></li>
						</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
      </div>
    </div>
    <div class="container">
        <?//= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>    
<?php $this->endContent();?>