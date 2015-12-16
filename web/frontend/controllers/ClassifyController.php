<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Areas;

/**
 * Site controller
 */
class ClassifyController extends Controller
{
   
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
	
    public function actionCity()
    {
    	$pid = intval(\Yii::$app->request->get('pid'));
    	$areas = Areas::getAreasByParentId($pid);
    	echo '<option value="">市</option>';
    	if($areas)
    	{
    		foreach ($areas as $k => $v)
    		{
    			echo '<option value="'.$v->id.'">'.$v->name.'</option>';
    		}
    	}
    }
    
    public function actionCounty()
    {
    	$pid = intval(\Yii::$app->request->get('pid'));
    	$areas = Areas::getAreasByParentId($pid);
    	echo '<option value="">区、县</option>';
    	if($areas)
    	{
    		foreach ($areas as $k => $v)
    		{
    			echo '<option value="'.$v->id.'">'.$v->name.'</option>';
    		}
    	}
    }
    
    public function actionAreastags()
    {
    	//获取省
    	$areas = Areas::getAreasByParentId(0);
    	$data = [];
    	foreach ($areas as $k => $v)
    	{
    		var_dump($v->childareas);exit;
    	}
    }
    
}