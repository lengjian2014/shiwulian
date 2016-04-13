<?php
use yii\helpers\Url;
function homeUrl($param=''){
	return Url::home($param);
}