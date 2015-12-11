<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserExpand */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Expand',
]) . ' ' . $model->uid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Expands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-expand-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
