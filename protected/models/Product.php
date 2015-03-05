<?php

class Product extends CActiveRecord
{

	public function tableName()
	{
		return '{{product}}';
	}

	public function rules()
	{
		return array(
			array('name_ua, name_ru, name_en, status', 'required'),
			array('catalog_id, sort, status, curent', 'numerical', 'integerOnly'=>true),
			array('name_ua, name_ru, name_en, url, price, new_price, images, color, marking, type', 'length', 'max'=>255),
			array('url, color, curent, type, marking, name_ua, name_ru, name_en, cloth_ua, cloth_ru, cloth_en, packing_ua, packing_ru, packing_en, url, title_ua, title_ru, title_en, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, material_ua, material_ru, material_en, price, new_price, images, lining_ua, lining_ru, lining_en, length_ua, length_ru, length_en, size_range_ua, size_range_ru, size_range_en', 'safe'),
			array('id, url, color, curent, type, marking, name_ua, name_ru, name_en, url, cloth_ua, cloth_ru, cloth_en, packing_ua, packing_ru, packing_en, title_ua, title_ru, title_en, keywords_ua, keywords_ru, keywords_en, description_ua, description_ru, description_en, content_ua, content_ru, content_en, material_ua, material_ru, material_en, lining_ua, lining_ru, lining_en, length_ua, length_ru, length_en, size_range_ua, size_range_ru, size_range_en, catalog_id, price, new_price, sort, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{

		return array(
			'colors'=>array(self::BELONGS_TO, 'Color', 'color'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name_ua' => 'Имя - UA',
			'name_ru' => 'Имя - RU',
			'name_en' => 'Имя - EN',
			'url' => 'Url - страницы',
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
			'material_ua' => 'Материал - UA',
			'material_ru' => 'Материал - RU',
			'material_en' => 'Материал - EN',
			'cloth_ua' => 'Ткань - UA',
			'cloth_ru' => 'Ткань - RU',
			'cloth_en' => 'Ткань - EN',
			'lining_ua' => 'Подкладка - UA',
			'lining_ru' => 'Подкладка - RU',
			'lining_en' => 'Подкладка - EN',
			'packing_ua' => 'Набивка - UA',
			'packing_ru' => 'Набивка - RU',
			'packing_en' => 'Набивка - EN',
			'length_ua' => 'Длина - UA',
			'length_ru' => 'Длина - RU',
			'length_en' => 'Длина - EN',
			'size_range_ua' => 'Размерный ряд - UA',
			'size_range_ru' => 'Размерный ряд - RU',
			'size_range_en' => 'Размерный ряд - EN',
			'color' => 'Цвет',
			'curent' => 'Товар с другим цветом',
			'images' => 'Основное фото',
			'catalog_id' => 'Каталоги товаров',
			'price' => 'Цена',
			'new_price' => 'Новая цена',
			'sort' => 'Сортировка',
			'status' => 'Статус',
			'marking' => 'Артикул',
			'type' => 'Тип',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name_ua',$this->name_ua,true);
		$criteria->compare('name_ru',$this->name_ru,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('marking',$this->marking);
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
		$criteria->compare('catalog_id',$this->catalog_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('new_price',$this->new_price,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('material_ua',$this->material_ua);
		$criteria->compare('material_ru',$this->material_ru);
		$criteria->compare('material_en',$this->material_en);
		$criteria->compare('cloth_ua',$this->lining_ua);
		$criteria->compare('cloth_ru',$this->lining_ru);
		$criteria->compare('cloth_en',$this->lining_en);
		$criteria->compare('lining_ua',$this->lining_ua);
		$criteria->compare('lining_ru',$this->lining_ru);
		$criteria->compare('lining_en',$this->lining_en);
		$criteria->compare('length_ua',$this->length_ua);
		$criteria->compare('length_ru',$this->length_ru);
		$criteria->compare('length_en',$this->length_en);
		$criteria->compare('packing_ua',$this->lining_ua);
		$criteria->compare('packing_ru',$this->lining_ru);
		$criteria->compare('packing_en',$this->lining_en);
		$criteria->compare('size_range_ua',$this->size_range_ua);
		$criteria->compare('size_range_ru',$this->size_range_ru);
		$criteria->compare('size_range_en',$this->size_range_en);
		$criteria->compare('color',$this->color);
		$criteria->compare('curent',$this->curent);
		$criteria->compare('images',$this->images);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getProductBasketId($id){
		return  self::model()->find('id = "'.$id.'"');
	}

    public static function getPublicProduct(){
        $criteria=new CDbCriteria();
        $criteria->condition='status=:status';
        $criteria->params = array(
            ':status'=>1,
        );

        $criteria->limit = '4';
        $criteria->order = 'RAND()';
        return self::model()->findAll($criteria);
    }

    public static function getPublicProductContent(){
        $criteria=new CDbCriteria();
        $criteria->condition='status=:status';
        $criteria->params = array(
            ':status'=>1,
        );

        $criteria->limit = '6';
        $criteria->order = 'RAND()';
        return self::model()->findAll($criteria);
    }

	public static function getProductIndex(){
		return self::model()->findAllByAttributes(array('status'=>1));
	}

	public static function getProductId($id){
		return self::model()->findAllByAttributes(array('status'=>1,'id'=>$id));
	}

	public static function getTopProduct(){
		$criteria = new CDbCriteria(); 
		$criteria->order = 'rand()'; 
		$criteria->limit = 10;  

		$basket = Basket::model()->findAll($criteria);
		$return = array();
		foreach ($basket as $value) {
			$return[] = self::getProductId($value->id_product);
		}

		return $return;
	}

	public static function getType($id=null){
		$sel = '<select name="Product[type]" id="Options_type">';
		$sel .= '<option value="">Выбирите тип</option>';
		$type = array('woman'=>'Женский','man'=>'Муржской');
		$type_product = self::model()->findByPk($id);
		foreach ($type as $key => $value) {
			if(isset($type_product)) $id_type = $type_product->type;
			if($key == $id_type){
				$sel .= '<option selected value="'.$key.'">'.$value.'</option>';
			} else {
				$sel .= '<option value="'.$key.'">'.$value.'</option>';
			}
		}
		$sel .= '</select>';
		return $sel;
	}

	public static function getInTProduct(){
		$criteria = new CDbCriteria();
		$criteria->condition='status=:status';
        $criteria->params = array(
            ':status'=>1,
        );
		$criteria->order = 'rand()'; 
		$criteria->limit = 4;  

		$return = self::model()->findAll($criteria);
		return $return;
	}

	public static function getProduct($url){
		return self::model()->findByAttributes(array('url'=>$url));
	}

	public static function getProductOptions($id,$idsize = 1){
		return Options::model()->findAllByAttributes(array('id_product'=>$id,'id_option'=>$idsize));
	} 

	public static function getProductOneOptions($id,$idsize = 1){
		return Options::model()->findByAttributes(array('id'=>$id,'id_option'=>$idsize));
	} 

	public static function getSum(){
		$session=new CHttpSession;
		$session->open();
		if($session['basket']){
			$basket = json_decode($session['basket'], true);
			$sumP = 0;
		if($basket['basket']){
			foreach ($basket['basket'] as $valid) {
				foreach ($valid as $vasUm) {
				$product = Product::model()->findByPk($vasUm['id']);
				$sumP +=  $product->price * $vasUm['count'];
				}
			}
		}
	}
		return $sumP;
	}

	public static function getColorBasket($id){
		if($id) $find = Color::model()->findByPK($id);
		else false;
		if(isset($find)) 
			if($find->lining != null) $div = '<div class="wrapper-color"><div class="one-color" style="background:'.$find->rgb.'"></div><div class="second-color" style="background:'.$find->lining.'"></div></div>';
            	else $div = '<div class="wrapper-color"><div class="weed-color" style="background:'.$find->rgb.'"></div></div>';
        else false;
        return $div;
	}

	public static function AttributesColor()
	{
		return CHtml::listData(Color::model()->findall(),'id','number_color');
	}

	public static function AttributesSize()
	{
		return CHtml::listData(Size::model()->findall(),'size','size');
	}

	public static function AttributesSizeOptions($size)
	{
		$sel = '<select name="Options[option][]" id="Options_option">';
		$sel .= '<option value="">Выбирите размер</option>';
		$sizes = Size::model()->findAll();
		foreach ($sizes as $value) {
			if($value->size == $size){
				$sel .= '<option selected value="'.$value->size.'">'.$value->size.'</option>';
			} else {
				$sel .= '<option value="'.$value->size.'">'.$value->size.'</option>';
			}
		}
		$sel .= '</select>';
		return $sel;
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
