<?php

namespace frontend\widgets;

use yii\bootstrap5\Widget;

class Service extends Widget
{
    public function run()
    {
        $models = \common\models\Service::find()->where(["status" =>1])->all();
//        "<pre>";
//        print_r($models); die();
        return $this->render('service',compact('models'));
    }
}