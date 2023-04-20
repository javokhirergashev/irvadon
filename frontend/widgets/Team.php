<?php

namespace frontend\widgets;

use yii\base\Widget;

class Team extends Widget
{
    public function run()
    {
        return $this->render('team');
    }
}