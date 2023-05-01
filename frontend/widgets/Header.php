<?php

namespace frontend\widgets;

use common\models\Menu;
use yii\bootstrap5\Widget;

class Header extends Widget
{
    public function run()
    {
        $models = Menu::find()->orderBy(["order_by"=> SORT_ASC])->all();
        return $this->render('header', compact('models'));
    }
}