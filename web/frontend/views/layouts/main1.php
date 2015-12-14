<?php 
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
$this->beginContent('@app/views/layouts/layout.php'); 
?>
	
    <div class="container">
    	<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

<?php $this->endContent(); ?>