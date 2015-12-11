<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserPraiseLog */

$this->title = Yii::t('app', 'Create User Praise Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Praise Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-praise-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
