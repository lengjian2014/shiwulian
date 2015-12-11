<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\DynamicTags */

$this->title = Yii::t('app', 'Create Dynamic Tags');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dynamic Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dynamic-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
