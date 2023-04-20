<?php

namespace frontend\widgets;

use yii\bootstrap5\Widget;

class Service extends Widget
{
    public function run()
    {
        return $this->render('service');
    }
}