<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsCommentReply */

$this->title = Yii::t('app', 'Create Goods Comment Reply');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods Comment Replies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-comment-reply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
