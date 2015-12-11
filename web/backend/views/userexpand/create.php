<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserExpand */

$this->title = Yii::t('app', 'Create User Expand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Expands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-expand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
