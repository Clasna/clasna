<?php

class Images extends CActiveRecord
{

	public function tableName()
	{
		return '{{images}}';
	}


	public function rules()
	{
		return array(
			/*array('path', 'required'),*/
			array('id_product, id_catalog', 'numerical', 'integerOnly'=>true),
			array('path', 'length', 'max'=>255),
			array('path', 'safe'),
			array('path', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_product, head, id_catalog, path', 'safe', 'on'=>'search'),
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
			'id_product' => 'Id Product',
			'id_catalog' => 'Id Catalog',
			'path' => 'Path',
			'head' => 'Сделать основным',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('head',$this->head);
		$criteria->compare('id_catalog',$this->id_catalog);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
