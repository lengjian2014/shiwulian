<?php
namespace mobile\widgets;

use yii\base\Widget;
 
class FooterWidget extends Widget
{
    public function init()
    {
        parent::init();
    }
 
    public function run()
    {
        return $this->render('@app/views/widgets/footer');
    }
}