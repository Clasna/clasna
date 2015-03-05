<?php

/**
 * This is the model class for table "{{wholesalers}}".
 *
 * The followings are the available columns in table '{{wholesalers}}':
 * @property integer $user_id
 * @property string $trade_activity
 * @property string $city_activities
 * @property integer $status
 */
class Wholesalers extends CActiveRecord
{

	public function tableName()
	{
		return '{{wholesalers}}';
	}


	public function rules()
	{
		return array(
			array('name, surname, country, city, phone, trade_activity, city_activities', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('phone', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			array('name, surname, country, city, phone, trade_activity, city_activities', 'length', 'max'=>255),
			array('user_id, name, surname, country, city, phone, trade_activity, city_activities, status', 'safe'),
			array('user_id, name, surname, country, city, phone, trade_activity, city_activities, status', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'name' => Yii::t('basket', 'name'),
			'surname' => Yii::t('basket', 'last_name'),
			'country' => Yii::t('basket', 'country'),
			'city' => Yii::t('basket', 'city'),
			'phone' => Yii::t('basket', 'phone_number'),
			'trade_activity' => Yii::t('user', 'trade_activity'),
			'city_activities' => Yii::t('user', 'city_activities'),
			'status' => 'Status',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('trade_activity',$this->trade_activity,true);
		$criteria->compare('city_activities',$this->city_activities,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if($this->isNewRecord){
					$this->status = 0;
                }
		return parent::beforeSave();
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
