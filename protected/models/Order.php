<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property string $id
 * @property string $fio
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property string $send_product
 * @property string $comment
 * @property string $sum
 * @property integer $status
 * @property string $time_order
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, phone, country', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('email','email'),
			array('phone', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('name, surname, email, phone, d_phone, country, sum, region, city, street, shipping, st_ship, payment, promo, send_str, m_index', 'length', 'max'=>255),
			array('name, surname, email, phone, d_phone, country, sum, region, city, street, shipping, st_ship, payment, promo, pay_comment, send_str, m_index', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, surname, email, phone, d_phone, country, sum, region, city, street, shipping, st_ship, payment, promo, pay_comment, send_str, m_index', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'email' => 'E-mail',
			'phone' => 'Номер',
			'd_phone' => 'Номер',
			'country' => 'Страна',
			'region' => 'Регион',
			'city' => 'Город',
			'street' => 'улица',
			'shipping' => 'Отправка',
			'st_ship' => 'улица отправки',
			'payment' => 'Оплата',
			'promo' => 'Промо код',
			'send_str' => 'Send Product',
			'm_index' => 'Индекс',
			'pay_comment' => 'Коментарий',
			'sum' => 'Общая сумма',
			'status' => 'Статус',
			'time_order' => 'Time Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('d_phone',$this->d_phone,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('street',$this->street,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->time_order = new CDbExpression('NOW()');
	        }
	        else
	            $this->time_order = new CDbExpression('NOW()');
	        return true;
	    }
	    else
	        return false;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
