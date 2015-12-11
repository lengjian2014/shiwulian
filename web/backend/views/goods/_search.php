<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'barcode') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'soldarea') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'market_price') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'classify') ?>

    <?php // echo $form->field($model, 'inventory') ?>

    <?php // echo $form->field($model, 'sales') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'scan') ?>

    <?php // echo $form->field($model, 'dynamic') ?>

    <?php // echo $form->field($model, 'trace') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'gps') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'admin_id') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
