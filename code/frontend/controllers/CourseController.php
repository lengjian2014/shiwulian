<?php

namespace frontend\controllers;

class CourseController extends \yii\web\Controller
{
	public $layout = 'course';
	
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
    	return $this->render("view");
    }
}
