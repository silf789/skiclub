<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 21.02.2016
 * Time: 13:49
 */
namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class LoginForm extends Model
{

    public $email;
    public $password;
    public $username;
    public $rememberMe = true;
    public $status;

    private $_user=false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required','on' => 'default'],
            ['email','email'],
            ['rememberMe','boolean'],
            ['password','validatePassword']
        ];
    }
    public function validatePassword($attribute)
    {
        if(!$this->hasErrors())
        {

            $user = $this->getUser();

            if(!$user || !$user->validatePassword1($this->password))
            {

                $this->addError($attribute, 'Неправильное имя пользователя или пароль');
            }
        }

    }

    public function getUser()
    {
        if($this->_user === false)
        {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }
    public function loginAdmin()
    {
        if ($this->validate() && User::isUserAdmin($this->username)) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }
    public function login()
    {
        if($this->validate())
        {
            $this->status = ($user = $this->getUser()) ? $user->status : User::STATUS_NOT_ACTIVE;
            if($this->status === User::STATUS_ACTIVE || $this->status === User::STATUS_ADMIN)
            {
                return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}