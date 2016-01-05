<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;
use frontend\models\UserExpand;
use frontend\models\Areas;
use common\models\ChangePasswordForm;
use yii\web\Response;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class DefaultController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	/**
	 * 用户信息
	 * @return Ambigous <string, string>
	 */
    public function actionIndex()
    {
    	$user= User::findById(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
    
    /**
     * 更新用户信息
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
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
    
    
    public function actionChangepwd()
    {
    	$model = new ChangePasswordForm(\Yii::$app->user->id);
    	
    	self::performAjaxValidation($model);
		if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) 
		{
			$this->redirect("index");
		}

		return $this->render('changepwd', [
					'model' => $model,
				]);
    }

    /**
     * Performs ajax validation.
     * @param Model $model
     * @throws \yii\base\ExitException
     */
    protected static function performAjaxValidation($model)
    {
    	if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
    		\Yii::$app->response->format = Response::FORMAT_JSON;
    		echo json_encode(\yii\widgets\ActiveForm::validate($model));
    		\Yii::$app->end();
    	}
    }
    
}