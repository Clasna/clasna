<?php

/**
 * This is the model class for table "{{basket}}".
 *
 * The followings are the available columns in table '{{basket}}':
 * @property string $id
 * @property integer $id_order
 * @property integer $id_product
 * @property string $count
 */
class Basket extends CActiveRecord
{

	public function tableName()
	{
		return '{{basket}}';
	}


	public function rules()
	{

		return array(
			array('id_order, id_product, count', 'required'),
			array('id_order, id_product', 'numerical', 'integerOnly'=>true),
			array('count', 'length', 'max'=>255),
			array('id, id_order, id_product, count', 'safe', 'on'=>'search'),
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
			'id_order' => 'Id Order',
			'id_product' => 'Id Product',
			'count' => 'Count',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('count',$this->count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
