<?php
namespace frontend\models;

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
    public $password2;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email','password','password2'],'required','message'=>'{attribute}不能为空'],
            ['email', 'email','message'=>'请输入正确的邮箱地址'],
            ['email', 'string', 'max' => 64,'tooLong'=>'邮箱地址过长'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮箱已经被注册'],

            ['password2', 'compare', 'compareAttribute'=>'password', 'message'=>'两次密码不一致'],
            [['password','password2'], 'string', 'min' => 6,'max'=>16,'tooLong'=>'请输入一个低于16位的密码','tooShort'=>'为了安全，请输入一个高于6位的密码'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email'=>'邮箱',
            'password'=>'密码',
            'password2'=>'重复密码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
