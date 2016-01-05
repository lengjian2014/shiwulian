<?php
namespace common\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class ChangePasswordForm extends Model
{
	public $oldpassword;
    public $password;
	public $password_repeat;
    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($uid, $config = [])
    {
        $this->_user = User::findIdentity($uid);
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['oldpassword', 'required'],
        	['oldpassword', 'validatePassword'],
        	
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password', 'compare', 'compareAttribute' => 'oldpassword', 'operator' => '!=', 'message' => "新密码与旧密码不能相同"],
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
	    	'oldpassword' => Yii::t('app', '旧密码'),
	    	'password' => Yii::t('app', '新密码'),
	    	'password_repeat' => Yii::t('app', '重复密码'),
    	];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
    	if (!$this->hasErrors()) {
    		if (!$this->_user || !$this->_user->validatePassword($this->oldpassword)) {
    			$this->addError($attribute, Yii::t('app', '旧密码不正确'));
    		}
    	}
    }
    
    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
		if($user->save())
		{
			return true;
		}
        return false;
    }
    
}
