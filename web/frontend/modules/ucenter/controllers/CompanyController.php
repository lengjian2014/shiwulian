<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\UserExpand;
use common\models\ChangePasswordForm;
use yii\web\Response;
use frontend\models\Company;
use common\components\FileUploaded;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class CompanyController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	/**
	 * 企业信息
	 * @return Ambigous <string, string>
	 */
    public function actionIndex()
    {
    	$model= Company::findCompanyByUid(\Yii::$app->user->id);
    	if(empty($model))
    		return $this->redirect(['update']);
    	
        return $this->render('index', ['model' => $model]);
    }
    
    /**
     * 更新企业信息
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionUpdate()
    {
    	$model= Company::findCompanyByUid(\Yii::$app->user->id);
    	if(empty($model))
    		$model = new Company();

    	if ($model->load(Yii::$app->request->post())) 
    	{
    		$model->logo = FileUploaded::getInstances($model, "logo");
    		if($model->save())
    			return $this->redirect(['index']);
    	}
		
    	$picture = !empty($model->logo) ? FileUploaded::formatImges($model->logo, "Company[logo]") : '';
    	return $this->render('update', [
    					'model' => $model,
    					'picture' => $picture
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