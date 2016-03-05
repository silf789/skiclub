<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;
    const STATUS_ADMIN = 2;
    /**
     * @inheritdoc
     */
    public $password;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', /*'password'*/], 'filter', 'filter' => 'trim'],
            [['username', 'email', /*'password'*/], 'required'],
            ['email','email'],
            ['username','string','min'=>2, 'max'=>255],
           /*['password','required','on' => 'create'],*/
            ['username','unique', 'message' => 'Это имя занято'],
            ['email','unique', 'message' => 'Этот почтовый адрес уже зарегистрирован'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password Hash'),
            'status' => Yii::t('app', 'Status'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),

                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /*is user  admin*/
    public static function isUserAdmin($username)
    {
        if (static::findOne(['username' => $username, 'status' => self::STATUS_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
    /*find*/
    public static function findByUsername($username)
    {

        return static::findOne([
            'username' => $username
        ]);
    }

    /*helpers*/
    public function setPassword($password)
    {

        $this->password_hash=Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validatePassword1($password)
    {

        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /* Users Autentification*/
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

}
