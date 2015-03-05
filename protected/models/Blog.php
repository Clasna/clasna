<?php

/**
 * This is the model class for table "{{blog}}".
 *
 * The followings are the available columns in table '{{blog}}':
 * @property string $id
 * @property string $name_ua
 * @property string $name_ru
 * @property string $name_en
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 * @property string $url
 * @property string $keywords_ua
 * @property string $keywords_ru
 * @property string $keywords_en
 * @property string $description_ua
 * @property string $description_ru
 * @property string $description_en
 * @property string $content_ua
 * @property string $content_ru
 * @property string $content_en
 * @property string $images
 * @property integer $status
 * @property string $getdate
 */
class Blog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{blog}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_ua, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name_ua, name_ru, name_en, title_ru, title_en, url, images', 'length', 'max'=>255),
			array('name_ua, name_ru, name_en, title_ua, title_ru, title_en, url, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, images, status, getdate', 'safe'),
			array('id, name_ua, name_ru, name_en, title_ua, title_ru, title_en, url, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, images, status, getdate', 'safe', 'on'=>'search'),
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
			'name_ua' => 'Name Ua',
			'name_ru' => 'Name Ru',
			'name_en' => 'Name En',
			'title_ua' => 'Title Ua',
			'title_ru' => 'Title Ru',
			'title_en' => 'Title En',
			'url' => 'Url',
			'keywords_ua' => 'Keywords Ua',
			'keywords_ru' => 'Keywords Ru',
			'keywords_en' => 'Keywords En',
			'description_ua' => 'Description Ua',
			'description_ru' => 'Description Ru',
			'description_en' => 'Description En',
			'content_ua' => 'Content Ua',
			'content_ru' => 'Content Ru',
			'content_en' => 'Content En',
			'images' => 'Images',
			'status' => 'Status',
			'getdate' => 'Getdate',
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
		$criteria->compare('name_ua',$this->name_ua,true);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('keywords_ua',$this->keywords_ua,true);
		$criteria->compare('keywords_ru',$this->keywords_ru,true);
		$criteria->compare('keywords_en',$this->keywords_en,true);
		$criteria->compare('description_ua',$this->description_ua,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_en',$this->description_en,true);
		$criteria->compare('content_ua',$this->content_ua,true);
		$criteria->compare('content_ru',$this->content_ru,true);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('getdate',$this->getdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getBlogContent(){
		return self::model()->findAll('status = 1');
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
