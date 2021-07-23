<?php

namespace app\models;
use yii\base\Model;

class Login extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'email'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            //ищем пользователя в базе даннных:
            $user = User::findOne(['username' => $this->username]);

            //если пользователь не найден либо пароль введен неверно, то выдаем ошибку:
            if (!$user || ($user->password != sha1($this->password)))
            {
                $this->addError($attribute, 'Не удаётся войти.');
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['username' => $this->username]);
    }
}
