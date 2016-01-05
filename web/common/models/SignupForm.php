<?php
namespace common\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '用户名已经存在'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮箱已经存在'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password', 'compare'],
            
            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    	'uid' => Yii::t('app', 'Uid'),
    	'username' => Yii::t('app', '用户名'),
    	'email' => Yii::t('app', '邮箱'),
    	'mobile' => Yii::t('app', '手机号'),
    	'password' => Yii::t('app', '密码'),
    	'password_repeat' => Yii::t('app', '重复密码'),
    	'password_reset_token' => Yii::t('app', '改密码'),
    	'password_hash' => Yii::t('app', '密码加密'),
    	'auth_key' => Yii::t('app', 'Auth Key'),
    	'resettoken' => Yii::t('app', 'Resettoken'),
    	'hash' => Yii::t('app', 'Hash'),
    	'status' => Yii::t('app', '1开启0关闭'),
    	'access_token' => Yii::t('app', '用户认证'),
    	'role' => Yii::t('app', '0普通用户，1管理员'),
    	'addtime' => Yii::t('app', 'Addtime'),
    	'updatetime' => Yii::t('app', 'Updatetime'),
    	];
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
