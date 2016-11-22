<?php

namespace console\controllers;

use common\components\phpQuery;
use common\models\Data;
use common\models\Tags;
class IndexController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex()
    {
//     	$html = file_get_contents('http://www.xinnong.net/news/difang/');
//     	$html = mb_convert_encoding($html, "UTF-8","GBK");
//     	$html = str_replace('gb2312', 'utf-8', $html);
//     	phpQuery::newDocumentHTML($html);
//     	$nei_box = pq(".nav2");
//     	foreach ($nei_box as $k => $v)
//     	{
//     		$ul = pq($v)->find("li");
//     		foreach ($ul as $key => $val)
//     		{
//     			$href = pq($val)->find("a")->attr("href");
//     			$text = pq($val)->find("a")->text();
//     			if($href && $text)
//     			{
//     				$this->getHangye($href, 5531, $text);
//     			}
//     		}
//     	}
//     	exit;
    	
    	$this->getHangye('http://www.xinnong.net/news/guoji/', 5532, '国际新闻');
    	exit('over');
    }
    
    /**
     * 行业资讯
     */
    public function getHangye($web_url = '', $classify_id = 0, $tags = '')
    {
    	$tags_id = '|';
    	if($tags)
    	{
    		$tags = explode(",", $tags);
    		foreach ($tags as $k => $v)
    		{
    			$tagmodel = Tags::findOne(['title' => $v]);
    			if(empty($tagmodel))
    				$tagmodel = new Tags();
    			$tagmodel->title = $v;
    			$tagmodel->save();
    			$tags_id .= $tagmodel->id .'|';
    		}
    	}
    	$url = $web_url;
    	do{
    		$html = file_get_contents($url);
    		$html = mb_convert_encoding($html, "UTF-8","GBK");
    		$html = str_replace('gb2312', 'utf-8', $html);
    		phpQuery::newDocumentHTML($html);
    		//$nei_box = pq(".lstpage");
    		//$news_list = $nei_box->find("ul > li")->count();
    		//phpQuery::newDocumentFile($url);
    		$nei_box = pq(".newslist");
    		$news_list = $nei_box->find("ul > li");
    		foreach ($news_list as $k => $v)
    		{
    			$url = pq($v)->find("a")->attr("href");
    			$url = 'http://www.xinnong.net' .$url;
    			$title = strip_tags(pq($v)->find("a")->html());
    			//$title = $title ? mb_convert_encoding($title, "UTF-8","GBK") : "";
    			//echo $title;
    			if(empty($title))
    				continue;
    			$model = Data::findOne(['title' => $title]);
    			if(empty($model))
    				$model = new Data();
    			$model->classify_id = $classify_id;
    			$model->title = $title;
    			$model->url = $url;
    			$model->tags = $model->tags.$tags_id;
    			$model->save();
    		}
    		$url = '';
    		$lstpage = pq(".lstpage");
    		$page = $lstpage->find("li");
    		foreach ($page as $k => $v)
    		{
    			$text = pq($v)->find("a")->html();
    			//$text = $text ? mb_convert_encoding($text, "UTF-8","GBK") : "";
    			if(trim($text) == "下一页")
    			{
    				$url = pq($v)->find("a")->attr("href");
    				$url = $url ? $web_url . $url : '';
    			}
    		}
    		echo $url .'\r\n';
    	}while ($url);
    	//exit('over');
    }

}
