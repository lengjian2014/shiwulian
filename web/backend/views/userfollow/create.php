<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserFollow */

$this->title = Yii::t('app', 'Create User Follow');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Follows'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-follow-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
