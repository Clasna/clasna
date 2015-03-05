<?php

/**
 * This is the model class for table "{{stores}}".
 *
 * The followings are the available columns in table '{{stores}}':
 * @property string $id
 * @property integer $city
 * @property string $stores
 * @property string $map
 * @property string $images
 * @property integer $sort
 * @property integer $status
 */
class Stores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{stores}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, city, map, images', 'required'),
			array('city, sort, status', 'numerical', 'integerOnly'=>true),
			array('name, images', 'length', 'max'=>255),
			array('id, name, city, stores_ua, stores_ru, stores_en, map, images, sort, status', 'safe'),
			array('id, name, city, stores_ua, stores_ru, stores_en, map, images, sort, status', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'city' => 'City',
			'stores_ua' => 'Stores UA',
			'stores_ru' => 'Stores RU',
			'stores_en' => 'Stores EN',
			'map' => 'Map',
			'images' => 'Images',
			'sort' => 'Sort',
			'status' => 'Status',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name);
		$criteria->compare('city',$this->city);
		$criteria->compare('stores_ua',$this->stores_ua,true);
		$criteria->compare('stores_ru',$this->stores_ru,true);
		$criteria->compare('stores_en',$this->stores_en,true);
		$criteria->compare('map',$this->map,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getStores($id_city){
		if(isset($id_city)){
			$city = self::model()->findAllByAttributes(array('city'=>$id_city));
		}
		return $city;
	}

	public static function getCity()
	{
		return CHtml::listData(City::model()->findall(),'id','name_ru');
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
