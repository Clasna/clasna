<?php

class Recovery extends CFormModel
{
	public $email;

	public function rules()
	{
		return array(
			array('email', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email'=>'E-mail',
		);
	}

}
