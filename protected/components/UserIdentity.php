<?php

class UserIdentity extends CUserIdentity {
    // Будем хранить id.
    protected $_id;
 
    // Данный метод вызывается один раз при аутентификации пользователя.
    public function authenticate(){
        // Производим стандартную аутентификацию, описанную в руководстве.
        if(isset($this->username)){
            $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        }
        if(isset($this->username)){
            $email = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));
        }

        //if($user->ban == 0) die ('Ваш пользователь забанен, если вы зарегистрировались первый раз ждите активацию.');
        if(isset($user)){
            if(($user===null) || (md5($this->password)!==$user->password)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else {
                // В качестве идентификатора будем использовать id, а не username,
                // как это определено по умолчанию. Обязательно нужно переопределить
                // метод getId(см. ниже).
                $this->_id = $user->id;
     
                // Далее логин нам не понадобится, зато имя может пригодится
                // в самом приложении. Используется как Yii::app()->user->name.
                // realName есть в нашей модели. У вас это может быть name, firstName
                // или что-либо ещё.
                $this->username = $user->username;
     
                $this->errorCode = self::ERROR_NONE;
            }
        }
        if(isset($email)){
            if(($email===null) || (md5($this->password)!==$email->password)) {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else {
                // В качестве идентификатора будем использовать id, а не username,
                // как это определено по умолчанию. Обязательно нужно переопределить
                // метод getId(см. ниже).
                $this->_id = $email->id;
     
                // Далее логин нам не понадобится, зато имя может пригодится
                // в самом приложении. Используется как Yii::app()->user->name.
                // realName есть в нашей модели. У вас это может быть name, firstName
                // или что-либо ещё.
                $this->username = $email->username;
     
                $this->errorCode = self::ERROR_NONE;
            }
        }
       return !$this->errorCode;
    }
 
    public function getId(){
        return $this->_id;
    }
}