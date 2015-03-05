<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $url
 * @property string $keywords
 * @property string $decription
 * @property string $text
 * @property integer $status
 * @property integer $comment
 * @property integer $role
 * @property string $getdate
 */
class Content extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_ua, name_ru, name_en, status', 'required'),
			array('status, comment, role', 'numerical', 'integerOnly'=>true),
			array('name_ua, name_ru, name_en, footer, url', 'length', 'max'=>255),
			array('name_ua, name_ru, name_en, url, header, title_ua, title_ru, title_en, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, footer, status, comment, role, getdate', 'safe'),
			array('id, name_ua, name_ru, name_en, url, header, title_ua, title_ru, title_en, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, footer, status, comment, role, getdate', 'safe', 'on'=>'search'),
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
			'name_ua' => 'Имя - UA',
			'name_ru' => 'Имя - RU',
			'name_en' => 'Имя - EN',
			'url' => 'Url',
			'title_ua' => 'Title - заголовок - UA',
			'title_ru' => 'Title - заголовок - RU',
			'title_en' => 'Title - заголовок - EN',
			'keywords_ua' => 'Keywords - ключевые слова - UA',
			'keywords_ru' => 'Keywords - ключевые слова - RU',
			'keywords_en' => 'Keywords - ключевые слова - EN',
			'description_ua' => 'Description - описание - UA',
			'description_ru' => 'Description - описание - RU',
			'description_en' => 'Description - описание - EN',
			'content_ua' => 'Content - контент - UA',
			'content_ru' => 'Content - контент - RU',
			'content_en' => 'Content - контент - EN',
			'footer' => 'Нижние блоки меню',
			'status' => 'Статус',
			'comment' => 'Комментарий',
			'role' => 'Роль',
			'getdate' => 'Дата',
		);
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->getdate = new CDbExpression('NOW()');
	        }
	        else
	            $this->getdate = new CDbExpression('NOW()');
	        return true;
	    }
	    else
	        return false;
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('keywords_ua',$this->keywords_ua,true);
		$criteria->compare('keywords_ru',$this->keywords_ru,true);
		$criteria->compare('keywords_en',$this->keywords_en,true);
		$criteria->compare('description_ua',$this->description_ua,true);
		$criteria->compare('description_ru',$this->description_ru,true);
		$criteria->compare('description_en',$this->description_en,true);
		$criteria->compare('content_ua',$this->content_ua,true);
		$criteria->compare('content_ru',$this->content_ru,true);
		$criteria->compare('content_en',$this->content_en,true);
		$criteria->compare('footer',$this->footer);
		$criteria->compare('status',$this->status);
		$criteria->compare('comment',$this->comment);
		$criteria->compare('role',$this->role);
		$criteria->compare('getdate',$this->getdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getContentFooter($footer = null)
	{
		$model=self::model()->findAllByAttributes(array('footer'=>$footer,'status'=>1));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
