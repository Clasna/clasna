<?php

class User extends CActiveRecord
{
    
    const ROLE_ADMIN = 'admin';
    //const ROLE_MODER = 'moderator';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
    public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}


	public function rules()
	{
		return array(
			array('password, email', 'required'),
            array('email','email'),
            array('username','match','pattern'=>'/^([A-Za-z0-9 ]+)$/u','message'=>'Допустимые симолы A-Za-z0-9 для имени.'),
			array('ban, role, status', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>255),
            /*array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'registration'),*/
			array('id, username, password, email, status, created, ban, role', 'safe', 'on'=>'search'),
		);
	}


	public function relations()
	{
		return array(
		);
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Login',
			'password' => Yii::t('user','youre_password'),
			'email' => 'E-mail',
			'created' => 'Дата',
			'ban' => 'Бан',
			'role' => 'Роль',
			'status' => 'Статус',
            'verifyCode'=> 'Код с картинки',
		);
	}

	public function phoneNumber($attribute,$params='')
	{
	    if(preg_match("/^\(?\d{3}\)?[\s-]?\d{3}[\s-]?\d{4}$/",$this->$attribute) === 0)
	    {   
	        $this->addError($attribute,
	            'Contact phone number is required and  may contain only these characters: "0123456789()- " in a form like (858) 555-1212 or 8585551212 or (213)555 1212' );  
	    }
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if($this->isNewRecord){
			//$this->created = time();
					$this->status = 0;
                    $this->role = 1;
                }
		//$this->password = md5($this->password);
		return parent::beforeSave();
	}

	public static function all()
	{
		return Chtml::listData(self::model()->findAll(),'id','username');
	}

}
