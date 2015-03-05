<?php

/**
 * This is the model class for table "{{color}}".
 *
 * The followings are the available columns in table '{{color}}':
 * @property string $id
 * @property string $color
 */
class Color extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{color}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rgb,number_color', 'required'),
			array('color, rgb, number_color, lining', 'length', 'max'=>255),
			array('id_option, status', 'numerical', 'integerOnly'=>true),
			array('id_option, color, number_color, lining', 'safe'),
			array('id, id_option, color, number_color, lining', 'safe', 'on'=>'search'),
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
			'color' => 'Color',
			'rgb' => 'RGB',
			'id_option' => 'id_option',
			'status' => 'Статус',
			'number_color' => 'Номер цвета',
			'lining' => 'Подкладка',
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
		$criteria->compare('number_color',$this->number_color,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('lining',$this->lining,true);
		$criteria->compare('rgb',$this->rgb,true);
		$criteria->compare('id_option',$this->id_option,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Color the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
