<?php

namespace frontend\controllers;

class NewsController extends \yii\web\Controller
{
	public $layout = 'layout';
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionView()
    {
    	return $this->render('view');
    }

}
