<?php
namespace common\components;

use Yii;
use yii\helpers\Url;
use yii\web\Response;
/**
 * FrontController 类作为登录状态下控制器的基类
 * 本基类操作登录用户的全站动作
 * @author hs150304
 */
class FrontController extends \yii\web\Controller
{
	public static $PAGE_SIZE = 20;
	//列表页大分页
	public static $LIST_PAGE_SIZE = 50;

	public function init()
	{
		parent::init();
		if(\Yii::$app->user->isGuest)
		{
			$this->redirect("/site/login");
		}
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
            'type' => $type,
            'message' => $message,
            'redirect' => $redirect
        ];

        if ($resultType === 'json') {
            Yii::$app->getResponse()->format = Response::FORMAT_JSON;
            return $data;
        } elseif ($resultType === 'html') {
            return $this->render('/common/message', $data);
        }
    }

    /**
     *判断是否是通过手机访问
     */
    public function isMobile() 
    {
    	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    	if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) 
    	{
    		return true;
    	}
    	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    	if (isset($_SERVER['HTTP_VIA'])) 
    	{
    		//找不到为flase,否则为true
    		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    	}
    	//判断手机发送的客户端标志,兼容性有待提高
    	if (isset($_SERVER['HTTP_USER_AGENT'])) 
    	{
    		$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp',
    				'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',
    				'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi',
    				'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
    		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
    		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) 
    		{
    			return true;
    		}
    	}
    	//协议法，因为有可能不准确，放到最后判断
    	if (isset($_SERVER['HTTP_ACCEPT'])) 
    	{
    		// 如果只支持wml并且不支持html那一定是移动设备
    		// 如果支持wml和html但是wml在html之前则是移动设备
    		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) 
    		{
    			return true;
    		}
    	}
    	return false;
    }
    
}