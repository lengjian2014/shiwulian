<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsTrace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-trace-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'goods_id')->textInput() ?>

    <?= $form->field($model, 'series_id')->textInput() ?>

    <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
