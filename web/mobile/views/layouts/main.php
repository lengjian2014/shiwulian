<?php
use mobile\assets\AppAsset;
$this->title = '食物链';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta name="wap-font-scale" content="no">
<title>splian</title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<?= $content?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>