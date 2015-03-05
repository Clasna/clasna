<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property integer $user_id
 * @property string $fio
 * @property string $birthday
 * @property string $city
 * @property string $adress
 * @property string $phone
 */
class Profiles extends CActiveRecord
{

	public $email;

	public function tableName()
	{
		return '{{profiles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone, city, country','required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name, surname, country, region, city, street, phone, d_phone, postal_code', 'length', 'max'=>255),
			array('user_id, postal_code, name, surname, country, region, city, street, phone, d_phone', 'safe'),
			array('user_id, postal_code, name, surname, country, region, city, street, phone, d_phone', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'name' => Yii::t('basket','name'),
			'surname' => Yii::t('basket','last_name'),
			'country' => Yii::t('basket','country'),
			'region' => Yii::t('basket','area'),
			'city' => Yii::t('basket','city'),
			'street' => Yii::t('basket','address'),
			'phone' => Yii::t('basket','phone_number'),
			'd_phone' => Yii::t('basket','extras_phone_number'),
			'postal_code' => Yii::t('basket', 'postal_code'),
			'email' => 'E-mail',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('d_phone',$this->d_phone,true);
		$criteria->compare('postal_code',$this->postal_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
