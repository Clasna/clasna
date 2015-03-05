<?php
class RecoveryPass extends CFormModel
{
	public $email;

	public function rules()
	{
		return array(
			array('email', 'required'),
			array('email', 'email'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => 'E-mail',
		);
	}

	public static function checkEmailUser($email){
		if($email)
			$email = User::model()->find('email = "'.$email.'"');		
		return $email;
	}

    public static function sendRecoveryMail($object){
    	if($object){
	$ger_pass = self::generate_password((int)8);
	if(self::saveNewPassword($object,$ger_pass)){
    			$name = '=?UTF-8?B?'.base64_encode('Восстановление пароля').'?=';
				$subject = '=?UTF-8?B?'.base64_encode('ANAZONE').'?=';
				$headers="From: $name <{$object}>\r\n".
					"Reply-To: {$object}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
				$body = 'Ваш новый пароль: <b>'.$ger_pass.'</b>';

				mail($object,$subject,$body,$headers);
	} else {
		false;
		exit;	
	}
    	}
    }


	public static function generate_password($number)
	  {
	    $arr = array('a','b','c','d','e','f',
		         'g','h','i','j','k','l',
		         'm','n','o','p','r','s',
		         't','u','v','x','y','z',
		         'A','B','C','D','E','F',
		         'G','H','I','J','K','L',
		         'M','N','O','P','R','S',
		         'T','U','V','X','Y','Z',
		         '1','2','3','4','5','6',
		         '7','8','9','0','.',',',
		         '(',')','[',']','!','?',
		         '&','^','%','@','*','$',
		         '<','>','/','|','+','-',
		         '{','}','`','~');
	    $pass = "";
	    for($i = 0; $i < $number; $i++)
	    {
	      $index = rand(0, count($arr) - 1);
	      $pass .= $arr[$index];
	    }
	    return $pass;
	  }

	public static function saveNewPassword($object,$_pass){
		if($object){
			$_model = User::model()->find('email = "'.$object.'"');
			$_model->password = md5($_pass);
			$_model->update(); 
		}
	return $_model;
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
?>
