<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\components;

use yii\base\Object;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * FileUploaded represents the information for an uploaded file.

 * @author MoLeng
 * @since 2.0
 */
class FileUploaded extends Object
{
	/**
	 * 单个文件上传
	 * @param unknown $model
	 * @param unknown $attribute
	 */
	public static function getInstance($model, $attribute)
	{
		$model->$attribute = UploadedFile::getInstance($model, $attribute);
		$path = self::saveAs($model->$attribute);
		
		return $path;
	}
	
	/**
	 * 多个文件上传
	 * @param unknown $model
	 * @param unknown $attribute
	 */
	public static function getInstances($model, $attribute)
	{	
		$data = [];
		if(!empty($model->$attribute))
			$data = $model->$attribute;
		
		$model->$attribute = UploadedFile::getInstances($model, $attribute);
		foreach ($model->$attribute as $file) 
		{
			//处理文件
         	$path = self::saveAs($file);
         	if($path) $data[] = $path;
        }

        return empty($data) ? '' : implode("|", array_filter($data));
	}
	
	/**
	 * 文件处理分发 根据不同文件 分别处理
	 * @param unknown $file
	 * @return Ambigous <NULL, string>
	 */
	public static function saveAs($file)
	{
		if(strpos($file->type, "image") !== false)
		{
			return self::saveAsImg($file);
		}
	}
	
	/**
	 * 图片上传
	 * @param unknown $picture
	 * @return string|NULL
	 */
	public static function saveAsImg($picture)
	{
		$imgdir = "uploads/images";
		$filePathName = self::getPathName($picture, $imgdir);
		if($picture->saveAs($filePathName))
			return $filePathName;
		
		return '';
	}
	
	/**
	 * 文件路径及名称
	 * @param unknown $file
	 * @param unknown $path
	 * @return string
	 */
	public static function getPathName($file, $path)
	{
		$path = $path . '/' . date("Y") . '/' . date("m") . '/';
		if(!file_exists($path) || !is_dir($path)){
			mkdir($path, 0777, true);
		}
		$extension = $file->getExtension();
		$uid = \Yii::$app->user->id ? \Yii::$app->user->id : '1000';
		$filename = $uid . date("YmdHis") . rand(1000, 9999) . '.' .$extension;
		
		return $path . $filename;
	}
	
	/**
	 * 编辑时上传文件
	 * @param unknown $picture
	 * @param unknown $inputName
	 * @return string
	 */
	public static function formatImg($picture, $inputName)
	{
		$str = Html::img(IMGURL . $picture, ['class'=>'file-preview-image', 'alt'=>'', 'title'=>'']);
		$str .= Html::input("hidden", $inputName, $picture);

		$html = <<<EOT
			<div class="file-thumbnail-footer">
			<div class="file-actions">
				<div class="file-footer-buttons">
				<button class="kv-file-remove btn btn-xs btn-default" title="删除文件" type="button">
					<i class="glyphicon glyphicon-trash text-danger"></i>
				</button>
				</div>
				<div class="clearfix"></div>
			</div>
		 </div>
EOT;
		
		return $str . $html;
	}
	
	public static function formatImgView($picture)
	{
		$data = [];
		if(!empty($picture))
		{
			$data = explode("|", $picture);
			foreach ($data as $k => $v)
			{
				$data[$k] = Html::img(IMGURL . $v, ['style'=>['width' => "50%"], 'alt'=>'', 'title'=>'', 'class' => "thumbnail-img"]);
			}
		}

		return empty($data) ? '' : implode("\n", $data);
	}
	
}