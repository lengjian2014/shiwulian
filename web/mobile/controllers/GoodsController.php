<?php
namespace mobile\controllers;
class GoodsController extends BaseController{
	public function actionList(){
		return $this->render('list');
	}
}