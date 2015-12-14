<?php
namespace common\components;

use Yii;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\ForbiddenHttpException;
/**
 * BackController类作为后台登录状态下控制器的基类
 * 本基类操作登录用户的全站动作
 * @author hs150304
 */
class BackController extends \yii\web\Controller
{
	
	/**
	 * Initializes the object.
	 * This method is invoked at the end of the constructor after the object is initialized with the
	 * given configuration.
	 */
	public function init()
	{
		parent::init();
		if(\Yii::$app->user->isGuest)
			$this->redirect("/site/login");
		if(\Yii::$app->user->identity->type != 10)
		{
			Yii::$app->user->logout();
			$this->redirect("/site/login");
		}	
		//$this->checkAccess();
	}
	
    /**
     * 显示flash信息
     * @param $message 信息显示内容
     * @param string $type 信息显示类型, ['info', 'success', 'error', 'warning']
     * @param null $url 跳转地址
     * @return Response
     */
    public function flash($message, $type = 'info', $url = null)
    {
        Yii::$app->getSession()->setFlash($type, $message);
        if ($url !== null) {
            Yii::$app->end(0, $this->redirect($url));
        }
    }

    /**
     * @param $message 信息显示内容
     * @param string $type 信息显示类型, ['info', 'success', 'error', 'warning']
     * @param null $redirect 跳转地址
     * @param null $resultType 信息显示格式
     * @return array|string
     */
    public function message($message, $type = 'info', $redirect = null, $resultType = null)
    {
        $resultType === null && $resultType = Yii::$app->getRequest()->getIsAjax() ? 'json' : 'html';
        is_array($redirect) && $redirect = Url::to($redirect);
        $data = [
        	'name' => "权限错误",
            'type' => $type,
            'message' => $message,
            'redirect' => $redirect
        ];

        if ($resultType === 'json') {
            Yii::$app->getResponse()->format = Response::FORMAT_JSON;
            return $data;
        } elseif ($resultType === 'html') {
        	throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
            //return $this->renderPartial('@app/views/site/error', $data);
        }
    }

    /**
     * 权限检查
     */
    public function checkAccess()
    {
    	$rbac = \Yii::$app->cache->get("rbac");
    	if(empty($rbac))
    	{
    		Yii::$app->authManager->loadFromCache();
    		$rbac = \Yii::$app->cache->get("rbac");
    	}
    	$authitem = str_replace("/", "_", \Yii::$app->requestedRoute);
    	if(key_exists($authitem, $rbac[2]))
    	{
    		if(!Yii::$app->authManager->checkAccess(\Yii::$app->user->id, $authitem))
    		{
    			$this->message("没有操作此项目的权限", "warning", \Yii::$app->request->getReferrer());
    		}
    	}
    	 
    }

    // public $ajaxLayout = '/ajaxMain';
    // public function findLayoutFile($view)
    // {
    //     if (($this->layout === null) && ($this->ajaxLayout !== false) && Yii::$app->getRequest()->getIsAjax()) {
    //         $this->layout = $this->ajaxLayout;
    //     }
    //     return parent::findLayoutFile($view);
    // }
}