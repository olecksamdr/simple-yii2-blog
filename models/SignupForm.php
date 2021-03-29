<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
 
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такий email вже існує.'],
 
            ['password', 'required'],
            // TODO: Add password minLength
            ['password', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful
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

      $user->save();
      
      return Yii::$app->user->login($user);
    }
}
