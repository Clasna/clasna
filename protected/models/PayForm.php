<?php

class PayForm extends CFormModel
{
	public $city;
	public $street;
	public $sm;
	public $payment_method;
	public $your_comments;
	public $promo_code;

	public function rules()
	{
		return array(
			array('city, sm, payment_method', 'required'),
			array('promo_code', 'numerical', 'integerOnly'=>true),
			array('city, street, sm, payment_method, promo_code, your_comments', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'city' => Yii::t('basket', 'city'),
			'street' => Yii::t('basket', 'address'),
			'sm'=>Yii::t('basket', 'sm'),
			'payment_method' => Yii::t('basket', 'payment_method'),
			'promo_code' => Yii::t('basket', 'promo_code'),
			'your_comments'=>Yii::t('basket', 'your_comments'),
		);
	}

	public function SelectCity(){
		$array = array(
			'0'=>Yii::t('basket', 'select_city_kiev'),
			'1'=>Yii::t('basket', 'select_city_lv'),
			'2'=>Yii::t('basket', 'select_city_kh'),
			'3'=>Yii::t('basket', 'select_city_zp'),
			'4'=>Yii::t('basket', 'select_city_dn'),
			);
		$select = '<select name="PayForm[city]">';
		$select .= '<option value >'.Yii::t('basket', 'select_city').'</option>';
		foreach ($array as $key => $value) {
		$select .= '<option value="'.$value.'">'.$value.'</option>';
		}
        $select .= '</select>';

        return $select;
	}

	public function SelectSm(){
		$array = array(
			'0'=>Yii::t('basket', 'nova_posta_warehouse'),
			'1'=>Yii::t('basket', 'nova_posta_to_door'),
			'2'=>Yii::t('basket', 'courier_delivery'),
			'3'=>Yii::t('basket', 'pickup'),
			);
		$select = '<select name="PayForm[sm]">';
		$select .= '<option value >'.Yii::t('basket', 'select_a_delivery_method').'</option>';
		foreach ($array as $key => $value) {
		$select .= '<option value="'.$value.'">'.$value.'</option>';
		}
        $select .= '</select>';

        return $select;
	}

	public function SelectPayment(){
		$array = array(
			'0'=>Yii::t('basket', 'cash_payment_upon_delivery'),
			'1'=>Yii::t('basket', 'cash_at_the_point_of_issue'),
			'2'=>Yii::t('basket', 'cash_on_delivery'),
			'3'=>Yii::t('basket', 'bank_card'),
			);
		$select = '<select name="PayForm[payment_method]">';
		$select .= '<option value >'.Yii::t('basket', 'select_a_payment_method').'</option>';
		foreach ($array as $key => $value) {
		$select .= '<option value="'.$value.'">'.$value.'</option>';
		}
        $select .= '</select>';

        return $select;
	}
}
