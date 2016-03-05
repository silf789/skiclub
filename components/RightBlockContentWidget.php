<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 27.01.2016
 * Time: 23:03
 */
namespace app\components;
use yii\base\Widget;

class RightBlockContentWidget extends Widget
{
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        $ar=145;
        return$this->render('rightBlockContent',[
            'ar' => $ar,
        ]);
    }
}