<?php 
use yii\helpers\Html;
use frontend\models\Dynamic;
?>
<div class="row">
		<div class="col-xs-12 col-sm-9">
			<div class="row main panel-content" style="margin-left:0px;margin-right:0px;margin-bottom:20px;padding:20px;">
				<div class="col-xs-12 col-sm-6">
					<div id="gallery" class="ad-gallery">
					      <div class="ad-image-wrapper"></div>
					      <div class="ad-nav">
					        <div class="ad-thumbs">
					          <ul class="ad-thumb-list">
					            <li>
					              <a href="/images/1.jpg">
					                <img src="/images/thumbs/t1.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/10.jpg">
					                <img src="/images/thumbs/t10.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/11.jpg">
					                <img src="/images/thumbs/t11.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/12.jpg">
					                <img src="/images/thumbs/t12.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/13.jpg">
					                <img src="/images/thumbs/t13.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/14.jpg">
					                <img src="/images/thumbs/t14.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/2.jpg" id="t2">
					                <img src="/images/thumbs/t2.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/3.jpg">
					                <img src="/images/thumbs/t3.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/4.jpg">
					                <img src="/images/thumbs/t4.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/5.jpg">
					                <img src="/images/thumbs/t5.jpg">
					              </a>
					            </li>
					            <li>
					              <a href="/images/6.jpg">
					                <img src="/images/thumbs/t6.jpg">
					              </a>
					            </li>
					          </ul>
					        </div>
					      </div>
					    </div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<h4><?=$model['title']?></h4>
					<p style="font-size:12px;color:#9d9d9d"><?=Html::encode($model['summary'])?></p>
					<p>
						<h4><small>产品分类：水果</small></h4>				
					</p>
					<p>
						<h4><small>放心指数：</small><i style="color:red;font-size:20px;"><?=$model['score']?></i></h4>				
					</p>
					<p>
						<button type="button" class="btn btn-success">快 速 询 单</button>
					</p>
				</div>
			</div>
			<div class="ucenter-content panel-content" style="padding:20px 20px;margin-bottom:20px;">
			<ul id="myTabs" class="nav nav-tabs" role="tablist">
				<li class="active" role="presentation">
					<a id="dynamic-tab" aria-controls="dynamic" data-toggle="tab" role="tab" aria-expanded="true" href="#dynamic">所有动态</a>
				</li>
				<li class="" role="presentation">
					<a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" aria-expanded="false" href="#profile" >产品详细</a>
				</li>
				<li class="" role="presentation">
					<a id="comment-tab" aria-controls="comment" data-toggle="tab" role="tab" aria-expanded="false" href="#comment">累计评论</a>
				</li>
				<li class="" role="presentation">
					<a id="trace-tab" aria-controls="profile" data-toggle="tab" role="tab" aria-expanded="false" href="#trace">追溯记录</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div id="dynamic" class="tab-pane fade active in" aria-labelledby="dynamic-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;padding-bottom:50px;">
				
				</div>
				<div id="profile" class="tab-pane fade in" aria-labelledby="profile-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;padding-bottom:50px;">
					<?=$model['detail']?>
				</div>
				<div id="comment" class="tab-pane fade in" aria-labelledby="comment-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;padding-bottom:50px;">
				
				</div>
				<div id="trace" class="tab-pane fade in" aria-labelledby="trace-tab" role="tabpanel" style="margin-top:30px;padding-left:20px;padding-bottom:50px;">
				
				</div>
			</div>
		</div>	
		</div>
		<div class="col-xs-12 col-sm-3">
			<!-- 个人信息 -->
		 	<div class="panel-content">
		 		<div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;店铺信息</p></div>
		 		<div style="margin-bottom:20px;padding:10px 10px 10px 15px;">
		 		<div class="media-left">
		 			<a href="#">
		 				<?php if(!empty($company['logo'])){?>
		 				<img class="media-object" style="width: 64px; height: 64px;" src="<?=IMGURL . $company['logo']?>">
		 				<?php }else{?>
						<img class="media-object" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTEwZjhjMjdkYyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTBmOGMyN2RjIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
						<?php }?>
					</a>
		 		</div>
		 		<div class="media-body">
		 			<h4 style="margin-top:0px;"><small><?=Html::encode($company['company'])?></small></h4>
		 			<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-left:5px;"></span></p>
		 		</div>
		 		<div style="font-size:12px;color:#9d9d9d;padding-bottom:10px;"><?=Html::encode($company['introduction'])?></div>
		 		<div>
				  <address style="margin-bottom:10px;">
				  <strong>地址</strong><br>
				  <?=Html::encode($company['address'])?><br>
				  <abbr>固定电话:</abbr> <?=Html::encode($company['phone'])?><br>
				  <abbr>手机号码:</abbr> <?=Html::encode($company['mobile'])?><br>
				</address>
				<address style="margin-bottom:10px;">
				  <strong>邮箱</strong><br>
				  <a href="mailto:#"><?=Html::encode($company['email'])?></a><br>
				</address>
				</div>
				</div>
		 </div>
		 <ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;公司地图</p></div></li>
				<li class="right-sidebar-key">
					<p><img width="100%" src="http://a2.att.hudong.com/43/80/01300000890997127676806377087.jpg"></p>
				</li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;其他产品</p></div></li>
				<li class="right-sidebar-key" style="padding-bottom: 0px;">
					<div class="thumbnail" style="margin-bottom: 0px;">
						<div class="row">
							<div class="col-xs-5 col-lg-12">
								<img alt="100%x200" style="height: 200px; width: 100%; display: block;" src="https://gd2.alicdn.com/imgextra/i2/124309387/TB2hphNdXXXXXbfXpXXXXXXXXXX_!!124309387.jpg_400x400.jpg" data-holder-rendered="true">
							</div>
							<div class="col-xs-7 col-lg-12">
							<div class="caption">
								<h5 style="margin-top:0px;height:50px;"><small>正宗秭归纽荷尔脐橙5斤 买2件送精美水果刀 新鲜采摘水果新鲜橙子</small></h5>
								<p>
									<span style="font-size:12px;float: left;">放心指数：<i style="color:red;font-size:14px;">10.0</i></span>
									<span style="font-size:12px;float: right;padding-left:5px;"><a>追溯(34)</a></span>
								</p>
							</div>
							</div>
						</div>
					</div>
				</li>
				<li class="right-sidebar-key">
					<div class="thumbnail" style="margin-bottom: 0px;">
						<div class="row">
							<div class="col-xs-5 col-lg-12">
								<img alt="100%x200" data-src="holder.js/100%x200" style="height: 200px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUxMTQ1Zjg4OTcgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTExNDVmODg5NyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTAwMDAzODE0Njk3MyIgeT0iMTA1LjciPjI0MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
							</div>
							<div class="col-xs-7 col-lg-12">
							<div class="caption">
								<h5 style="margin-top:0px;height:50px;"><small>正宗秭归纽荷尔脐橙5斤 买2件送精美水果刀 新鲜采摘水果新鲜橙子</small></h5>
								<p>
									<span style="font-size:12px;float: left;">放心指数：<i style="color:red;font-size:14px;">10.0</i></span>
									<span style="font-size:12px;float: right;padding-left:5px;"><a>追溯(34)</a></span>
								</p>
							</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar panel-content">
				<li><div class="right-sidebar-title" ><p style="margin:0;"><span class="glyphicon glyphicon-tags"></span>&nbsp;相关产品</p></div></li>
				<li class="right-sidebar-key">
					<div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE4NjI5NDQyYiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTg2Mjk0NDJiIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><small>陕西洛川苹果红富士</small></h4>
							<span style="font-size:12px;">放心指数：</span><i style="color:red;font-size:14px;">10.0</i>
						</div>
					</div>
				</li>
				<li class="right-sidebar-key">
					<div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE4NjI5NDQyYiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTg2Mjk0NDJiIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><small>陕西洛川苹果红富士</small></h4>
							<span style="font-size:12px;">放心指数：</span><i style="color:red;font-size:14px;">10.0</i>
						</div>
					</div>
				</li>
				<li class="right-sidebar-key">
					<div class="media">
						<div class="media-left">
							<a href="#">
								<img class="media-object" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTE4NjI5NDQyYiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MTg2Mjk0NDJiIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><small>陕西洛川苹果红富士</small></h4>
							<span style="font-size:12px;">放心指数：</span><i style="color:red;font-size:14px;">10.0</i>
						</div>
					</div>
				</li>
			</ul>
			<ul class="nav nav-sidebar right-sidebar">
				<li class="right-sidebar-accounts"><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
				<li><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
				<li><div class="right-sidebar-title"><span class="glyphicon glyphicon-tags"></span> 热门关键词</div></li>
			</ul>
		</div>
	  </div>
<?php
$script = <<<JS
	var galleries = $('.ad-gallery').adGallery({
									loader_image : '/images/loader.gif',
									update_window_hash: false,
									slideshow: {
										    enable: true,
										    autostart: true,
										    speed: 3000,
									}
								});
	$("#dynamic").load("/goods/dynamic?gid={$model['id']}", function(){});
	$(document).on("click", "#myTabs > li > a", function(){
		var action = $(this).attr("href").substr(1);
		if($("#" + action).html().trim() == ""){
			var url = "/goods/" + action + "?gid={$model['id']}";
			$("#" + action).load(url, function(){});
		}
	});
JS;
$this->registerJs($script);
?>	  