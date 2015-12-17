<?php
namespace frontend\modules\ucenter\controllers;

use Yii;
use common\components\FrontController;
use frontend\models\UserCertification;
use common\components\FileUploaded;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\UserRole;

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
   				return $this->redirect([$this->action->id]);
   		}
   		
   		$picture = [];
   		if(!empty($model->picture))
   		{
   			$picture = explode("|", $model->picture);
   			foreach ($picture as $k => $v)
   			{
   				$picture[$k] = FileUploaded::formatImges($v, "UserCertification[picture][{$k}]");
   			}
   		}
   		
   		$category = $model->type == 0 ? ['0' => "身份证", '1' => "驾驶证"] : ['0' => "营业执照"];
   		return ['model' => $model, 'picture' => $picture, 'category' => $category];
   	}
	
   	/**
   	 * 角色认证
   	 * @return Ambigous <string, string>
   	 */
   	public function actionRole()
   	{
   		$model = UserRole::getUserRoleByUid(\Yii::$app->user->id);

   		return $this->render("role", ['model' => $model]);
   	}
	
   	/**
   	 * 角色认证编辑
   	 * @return Ambigous <string, string>
   	 */
   	public function actionRolecreate()
   	{
   		$role = \Yii::$app->request->get("role", 0);
   		$model = UserRole::getRoleByUidAndRole(\Yii::$app->user->id, $role);
   		if(empty($model)) 
   			$model = new UserRole();
   		if ($model->load(Yii::$app->request->post())) 
   		{
   			$model->picture = FileUploaded::getInstances($model, "picture");
			if($model->save())
   				return $this->redirect(['role', 'id' => $model->id]);
   		}

   		$model->role = $role;
   		return $this->renderAjax("_roleform", ['model' => $model]);
   	}
   	/**
   	 * 角色认证视图
   	 * @return Ambigous <string, string>
   	 */
   	public function actionRoleview($id)
   	{
   		$model = UserRole::getById($id);
   		if(empty($model))
   			$model = new UserRole();
   		
   		return $this->renderAjax("_roleview", ['model' => $model]);
   	}

}