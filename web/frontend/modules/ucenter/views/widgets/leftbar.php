<div class="panel-group" id="leftaccordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title" role="button"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          用户中心
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse <?=$this->context->id == 'default' ? 'in' : ''?>" role="tabpanel" aria-labelledby="headingOne">
      <div class="list-group">
		  <a href="/ucenter" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/default/index' ? 'active' : ''?>"><span class="glyphicon glyphicon-cog" style="margin-right: 5px;"></span> 账户设置</a>
		  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" style="margin-right: 5px;"></span> 修改头像</a>
		  <a href="/ucenter/default/changepwd" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/default/changepwd' ? 'active' : ''?>"><span class="glyphicon glyphicon-asterisk" style="margin-right: 5px;"></span> 修改密码</a>
		  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-envelope" style="margin-right: 5px;"></span> 邮箱验证</a>
		  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-phone" style="margin-right: 5px;"></span> 手机验证</a>
		  
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          认证管理
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse <?=$this->context->id == 'authenticate' ? 'in' : ''?>" role="tabpanel" aria-labelledby="headingSix">
		<div class="list-group">
			  <a href="/ucenter/authenticate/role" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/authenticate/role' ? 'active' : ''?>"><span class="glyphicon glyphicon-user" style="margin-right: 5px;"></span> 角色认证</a>
			  <a href="/ucenter/authenticate/realname" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/authenticate/realname' ? 'active' : ''?>"><span class="glyphicon glyphicon-credit-card" style="margin-right: 5px;"></span> 实名认证</a>
			  <a href="/ucenter/authenticate/enterprise" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/authenticate/enterprise' ? 'active' : ''?>"><span class="glyphicon glyphicon-ok" style="margin-right: 5px;"></span> 企业认证</a>
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          产品动态
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse <?=$this->context->id == 'dynamic' ? 'in' : ''?>" role="tabpanel" aria-labelledby="headingSeven">
		<div class="list-group">
		  <a href="/ucenter/dynamic" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/dynamic/index' ? 'active' : ''?>"><span class="glyphicon glyphicon glyphicon-comment" style="margin-right: 5px;"></span> 所有动态</a>
		  <a href="/ucenter/dynamic/create" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/dynamic/create' ? 'active' : ''?>"><span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span> 添加动态</a>
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          商品管理
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse <?=$this->context->id == 'goods' ? 'in' : ''?>" role="tabpanel" aria-labelledby="headingThree">
		<div class="list-group">
		  <a href="/ucenter/goods" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/goods/index' ? 'active' : ''?>"><span class="glyphicon glyphicon-menu-hamburger" style="margin-right: 5px;"></span> 我的产品</a>
		  <a href="/ucenter/goods/create" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/goods/create' ? 'active' : ''?>"><span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span> 新增产品</a>
		  <a href="/ucenter/goods/partner" class="list-group-item <?=Yii::$app->controller->getRoute() == 'ucenter/goods/partner' ? 'active' : ''?>"><span class="glyphicon glyphicon-transfer" style="margin-right: 5px;"></span> 合作产品</a>
		</div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          我的消息
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		<div class="list-group">
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-envelope" style="margin-right: 5px;"></span> 私信</a>
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart" style="margin-right: 5px;"></span> 询单</a>
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-file" style="margin-right: 5px;"></span> 站内信</a>
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          我的关注
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		<div class="list-group">
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-star-empty" style="margin-right: 5px;"></span> 我关注的</a>
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-star" style="margin-right: 5px;"></span> 关注我的</a>
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFives">
      <h4 class="panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFives" aria-expanded="false" aria-controls="collapseFives">
          我的收藏
      </h4>
    </div>
    <div id="collapseFives" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFives">
		<div class="list-group">
			  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-tags" style="margin-right: 5px;"></span> 我的收藏</a>
		</div>
    </div>
  </div>
</div>