<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;


class Signup extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'email'],
            ['username', 'unique', 'targetClass' => '\app\models\User'],
            ['password', 'string', 'min'=>4, 'max'=>30],
        ];
    }

    //добавление пользователя в БД, в таблицу "user"
    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = sha1($this->password);
        return $user->save();
    }
}
