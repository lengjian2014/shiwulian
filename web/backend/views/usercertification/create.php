<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserCertification */

$this->title = Yii::t('app', 'Create User Certification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Certifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-certification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
