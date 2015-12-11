<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DynamicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dynamic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'goods_id') ?>

    <?= $form->field($model, 'series_id') ?>

    <?= $form->field($model, 'classify_id') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'scan') ?>

    <?php // echo $form->field($model, 'like') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'gps') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
