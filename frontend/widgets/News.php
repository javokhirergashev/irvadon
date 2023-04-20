<?php

namespace frontend\widgets;

use yii\bootstrap5\Widget;

class News extends Widget
{
    public function run()
    {
        return $this->render('news');
    }
}