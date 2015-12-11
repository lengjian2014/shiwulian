<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserExpand */

$this->title = $model->uid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Expands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-expand-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'uid',
            'nickname',
            'photo',
            'gender',
            'birthday',
            'hometown',
            'telephone',
            'qq',
            'address',
            'validemail:email',
            'validmobile',
            'addtime:datetime',
            'updatetime:datetime',
        ],
    ]) ?>

</div>
