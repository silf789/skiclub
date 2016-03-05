<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 21.02.2016
 * Time: 13:49
 */
namespace app\models;

use yii\base\Model;
use Yii;

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            ['username','string','min'=>2, 'max'=>255],
            ['password','string','min'=>6, 'max'=>255],
            ['username','unique','targetClass' => User::className(),'message' => 'Это имя уже занято.'],
            ['email','email'],
            ['email','unique','targetClass' => User::className(),'message' => 'Эта почта уже занята.'],
            ['status','default','value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status','in','range'=>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE]]
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password' => 'Пароль'
        ];
    }
    public function reg()
    {
        $user = new User();
        $user->username=$this->username;
        $user->email=$this->email;
        $user->status=$this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : $user->getErrors();
    }
}