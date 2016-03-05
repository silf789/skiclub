<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.02.2016
 * Time: 21:51
 */
namespace app\models;

use yii;
use yii\base\Model;


class EditContentForm extends Model
{
    public $id;
    public $date;
    public $cathegory;
    public $title;
    public $text;
    public $metad;
    public $metak;

    public function rules()
    {
        return [
            [['date','cathegory','title','text','metad','metak'],'required']
        ];
    }
} 