<?php
namespace app\models;

use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeat_password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email already in use.'],
            ['email', 'email'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['repeat_password', 'required'],
            ['repeat_password', 'compare','compareAttribute'=>'password'],
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

        return $user->save() ? $user->getPrimaryKey() : null;
    }
}
