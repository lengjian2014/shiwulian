<?php
namespace mobile\controllers;
class GoodsController extends BaseController{
	public function actionList(){
		return $this->render('list');
	}
	public function actionDynamic(){
		return $this->render('dynamic');
	}
}