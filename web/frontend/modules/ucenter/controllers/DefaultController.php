<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;
use frontend\models\UserExpand;
use frontend\models\Areas;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class DefaultController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
    public function actionIndex()
    {
    	$user= User::findById(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
    
    public function actionUpdate()
    {
    	//$user = User::findById(\Yii::$app->user->id);
    	$userexpand = UserExpand::findById(\Yii::$app->user->id);
    	if(empty($userexpand))
    		$userexpand = new UserExpand();
    	//默认uid
    	$userexpand->uid = \Yii::$app->user->id;
    	if ($userexpand->load(Yii::$app->request->post())) 
    	{
    		$userexpand->birthday = (string)strtotime($userexpand->birthday);
    		if($userexpand->save())
    			return $this->redirect(['index']);
    	}

    	$userexpand->birthday = date("Y-m-d", $userexpand->birthday);
    	return $this->render('update', [
    					//'user' => $user,
    					'userexpand' => $userexpand,
    				]);
    }

}