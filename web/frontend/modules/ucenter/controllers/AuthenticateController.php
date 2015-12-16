<?php
namespace frontend\modules\ucenter\controllers;

use Yii;
use common\components\FrontController;
use frontend\models\UserCertification;
use common\components\FileUploaded;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * 网站认证
 */
class AuthenticateController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	public function actionIndex()
	{
   		
  	}
   
  	/**
  	 * 企业认证
  	 * @return Ambigous <string, string>
  	 */
   	public function actionEnterprise()
   	{
   		$edit = \Yii::$app->request->get("edit", 0);
   		$model = UserCertification::getInfoByUidAndType(\Yii::$app->user->id, 1);
   		if(!$edit && $model)
   		{
   			return $this->render("view", ['model' => $model]);
   		}
   		//新建或编辑
   		if(empty($model)) 
   			$model = new UserCertification();
   		$model->type = 1;
   		$data = $this->QualifiedCreate($model);
   		
   		return $this->render("form", $data);
   	}
   	
   	/**
   	 * 企业认证
   	 * @return Ambigous <string, string>
   	 */
   	public function actionRealname()
   	{
   		$edit = \Yii::$app->request->get("edit", 0);
   		$model = UserCertification::getInfoByUidAndType(\Yii::$app->user->id, 0);
   		if(!$edit && $model)
   		{
   			return $this->render("view", ['model' => $model]);
   		}
   		//新建或编辑
   		if(empty($model)) 
   			$model = new UserCertification();
   		$model->type = 0;
   		$data = $this->QualifiedCreate($model);
   		
   		return $this->render("form", $data);
   	}

   	public function QualifiedCreate($model)
   	{
   		if ($model->load(Yii::$app->request->post()))
   		{
   			$model->picture = FileUploaded::getInstances($model, "picture");
   			if($model->save())
   				return $this->redirect(['view', 'id' => $model->id]);
   		}
   		
   		$picture = [];
   		if(!empty($model->picture))
   		{
   			$picture = explode("|", $model->picture);
   			foreach ($picture as $k => $v)
   			{
   				$picture[$k] = FileUploaded::formatImg($v, "UserCertification[picture][{$k}]");
   			}
   		}
   		
   		return ['model' => $model, 'picture' => $picture];
   	}









}