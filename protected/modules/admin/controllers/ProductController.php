<?php

class ProductController extends Admin
{
	public $imgPath = '/images/product';

	public function actionCreate()
	{
		$model = new Product;
		$im = new Images;

		if(isset($_POST['Product']))
		{

		$image = CUploadedFile::getInstance($model, 'images');
		$model->attributes=$_POST['Product'];

		if($image){
				$rand = uniqid();
				$imgFileName = $model->images = $this->imgPath . '/' . $rand . '_' . $image->name;
				$imgFileName = '.'.$imgFileName;
		$image->saveAs( $imgFileName );
		$smoll = $this->imgPath . '/' . $rand . '_smoll' . $image->name;
		$thumb=Yii::app()->phpThumb->create('.'.$this->imgPath . '/' . $rand . '_' . $image->name);
		$thumb->resize(320,364);
		$thumb->save('.'.$smoll);
			}

			if($model->validate()){
				if($image){
					$model->images_small = $smoll;
				}
				if($_POST['Product']['color']){
					$id_color = $_POST['Product']['color'];
					$number_color = $this->getNameColor($id_color);
				}
			$slug = $this->SlugHelperUrl($_POST['Product']['name_ua']);
			$model->url = $slug.'-'.$number_color->number_color;
			if($model->save()) true;

			$images = CUploadedFile::getInstancesByName('path');
			if (isset($images) && count($images) > 0) { 
			foreach ($images as $image => $pic) {
			$newName = explode('.', $pic->name);
			$newName = rand(110, 1000).'_id_product_'.$model->id.'.'.$newName[1];
			if($pic){
				$imgFileNameS = $this->imgPath . '/' . time() . '_.' .$newName;
				$imgFileName = '.'.$imgFileNameS;
			}
			$pic->saveAs( $imgFileName ); 
			$img=new Images();
			$img->path = $imgFileNameS;
			$img->id_product = $model->id;
			$img->save();

			}
			}

			$coun = count($_POST['Options']['id_option']);
				for ($i=0; $i < $coun; $i++) { 
					$option = new Options;
					$option->id_option = $_POST['Options']['id_option'][$i];
					$option->id_product = $model->id;
					$option->option = $_POST['Options']['option'][$i];
					if(!$option->save(false)) true;
				}
			}
			$this->redirect(array('update','id'=>$model->id));	
				
		}

		$_models=new Options;
		$this->render('create',array(
			'model'=>$model,
			'_models'=>$_models,
			'im'=>$im,
			'color'=>isset($color)?$color:null,
		));
	}

	public function getNameColor($id){
		return Color::model()->findByPk($id);
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_img = $model->images;
		$old_smoll = $model->images_small;
		$model->scenario = 'update';

		if(isset($_GET['delimg'])){
			$modelImg = Images::model()->findByPk($_GET['delimg']);
			$path_img = $modelImg->path;
			if($modelImg->delete()){
				if($path_img && file_exists('.'.$path_img)){
					unlink('.'.$path_img);
				$this->redirect(array('update','id'=>$model->id));	
				}
			}
		}

		$img = new Images;

		if(isset($_POST['Color'])){
			$color_id = (int)$_POST['id_color'];
			$modelcolor = $this->loadModel($color_id);
			$modelcolor->parent_color = $color_id;
			if($modelcolor->save()) true;
			$IDmodel = $this->Color($color_id);
			$this->redirect(array('update','id'=>$IDmodel));
		}

		if(isset($_POST['CP'])){

			$model_copy = $this->loadModel($_POST['id_product']);
			$model_copy_options = $this->loadModelOptions($_POST['id_product']);
			$modelp=new Product;
			$modelp->name_ua = $model_copy->name_ua.'--КОПИЯ';
			$modelp->name_ru = $model_copy->name_ru.'--КОПИЯ';
			$modelp->name_en = $model_copy->name_en.'--КОПИЯ';
			$modelp->status = 0;
			if($modelp->save())
			
				$count = count($model_copy_options);
				for ($i=0; $i < $count; $i++) {
					$_models=new Options;
					$_models->id_product = $modelp->id;
					$_models->id_option = $model_copy_options[$i]['id_option'];
					$_models->option = $model_copy_options[$i]['option'];
					if($_models->save()) true;
				}
				$copy_product = 'Копия продукта <a href="/admin/product/update/'.$modelp->id.'" target="_blank">- '.$model_copy->name.'--КОПИЯ</a> сделана.';
		}

		if(isset($_GET['getid'])){
			$idGet = $_GET['getid'];
			$this->loadModelDelOptions($idGet)->delete();

			$this->redirect(array('update','id'=>$model->id));
		}

		if(isset($_POST['Product']))
		{
			$count = count($_POST['Options']['id_option']);
			for ($i=0; $i < $count; $i++) {
			if(isset($_POST['Options']['id'][$i])){
			$models = Options::model()->find('id = '.$_POST['Options']['id'][$i]);
			$models->id_product = $model->id; 
			$models->id_option = $_POST['Options']['id_option'][$i];
			$models->option = $_POST['Options']['option'][$i];
			$models->update();
			} else {
			$models = new Options;
			$models->id_product = $model->id; 
			$models->id_option = $_POST['Options']['id_option'][$i];
			$models->option = $_POST['Options']['option'][$i];
			$models->save();	
			}
			}

			$model->attributes=$_POST['Product'];
			$image = CUploadedFile::getInstance($model, 'images');
			if($image){
				$rand = uniqid();
				$imgFileName = $model->images = $this->imgPath . '/' . $rand . '_' . $image->name;
				$imgFileName = '.'.$imgFileName;
			} else {
				$model->images = $old_img;
				$model->images_small = $old_smoll;
			}
			if($model->validate()){
			if($image){
			$model->images_small = $this->imgPath . '/' . $rand . '_smoll' . $image->name;
			}
				if($_POST['Product']['color']){
					$id_color = $_POST['Product']['color'];
					$number_color = $this->getNameColor($id_color);
				}
			$slug = $this->SlugHelperUrl($_POST['Product']['name_ua']);
			$model->url = $slug.'-'.$number_color->number_color;
			if($model->save()) true;
				if($image){
					$image->saveAs( $imgFileName );

					$smoll = $this->imgPath . '/' . $rand . '_smoll' . $image->name;
					$thumb=Yii::app()->phpThumb->create('.'.$this->imgPath . '/' . $rand . '_' . $image->name);
					$thumb->resize(320,364);
					$thumb->save('.'.$smoll);

					if($old_img && file_exists('.'.$old_img)){
						unlink('.'.$old_img);
					}
					if($old_smoll && file_exists('.'.$old_smoll)){
						unlink('.'.$old_smoll);
					}
				}

				$images = CUploadedFile::getInstancesByName('path');
				if (isset($images) && count($images) > 0) { 
				foreach ($images as $image => $pic) {
				$newName = explode('.', $pic->name);
				$newName = rand(110, 1000).'_id_product_'.$model->id.'.'.$newName[1];
				if($pic){
					$imgFileNameS = $this->imgPath . '/' . time() . '_.' .$newName;
					$imgFileName = '.'.$imgFileNameS;
				}
				$pic->saveAs( $imgFileName );
				$img=new Images();
				$img->path = $imgFileNameS;
				$img->id_product = $model->id;
				$img->save();

				}
				}
			}
				$this->redirect(array('update','id'=>$model->id));
		}
		$__models=new Options;
		$models = $this->loadModelOptions($id);
		$this->render('update',array(
			'model'=>$model,
			'models'=>$models,
			'copy_product'=>isset($copy_product)?$copy_product:null,
			'__models' => $__models,
			'im'=>isset($im)?$im:null,
			'color'=>isset($color)?$color:null,
		));
	}

	public function Color($id_product){
		if(isset($id_product)){
			$model_copy = $this->loadModel($id_product);
			$model_copy_options = $this->loadModelOptions($id_product);
			$modelp=new Product;

			$modelp->name_ua = !empty($model_copy->name_ua)?$model_copy->name_ua.'New color':null;
			$modelp->name_ru = !empty($model_copy->name_ru)?$model_copy->name_ru.'New color':null;
			$modelp->name_en = !empty($model_copy->name_en)?$model_copy->name_en.'New color':null;
			$modelp->title_ru = !empty($model_copy->title_ru)?$model_copy->title_ru:null;
			$modelp->title_ua = !empty($model_copy->title_ua)?$model_copy->title_ua:null;
			$modelp->title_en = !empty($model_copy->title_en)?$model_copy->title_en:null;
			$modelp->url = null;
			$modelp->keywords_ua = !empty($model_copy->keywords_ua)?$model_copy->keywords_ua:null;
			$modelp->keywords_ru = !empty($model_copy->keywords_ru)?$model_copy->keywords_ru:null;
			$modelp->keywords_en = !empty($model_copy->keywords_en)?$model_copy->keywords_en:null;
			$modelp->description_ua = !empty($model_copy->description_ua)?$model_copy->description_ua:null;
			$modelp->description_ru = !empty($model_copy->description_ru)?$model_copy->description_ru:null;	
			$modelp->description_en = !empty($model_copy->description_en)?$model_copy->description_en:null;							
			$modelp->content_ua = !empty($model_copy->content_ua)?$model_copy->content_ua:null;
			$modelp->content_ru = !empty($model_copy->content_ru)?$model_copy->content_ru:null;
			$modelp->content_en = !empty($model_copy->content_en)?$model_copy->content_en:null;

			$modelp->material_ua = !empty($model_copy->material_ua)?$model_copy->material_ua:null;
			$modelp->material_ru = !empty($model_copy->material_ru)?$model_copy->material_ru:null;
			$modelp->material_en = !empty($model_copy->material_en)?$model_copy->material_en:null;
			$modelp->length_ua = !empty($model_copy->length_ua)?$model_copy->length_ua:null;
			$modelp->length_ru = !empty($model_copy->length_ru)?$model_copy->length_ru:null;
			$modelp->length_en = !empty($model_copy->length_en)?$model_copy->length_en:null;
			$modelp->lining_ua = !empty($model_copy->lining_ua)?$model_copy->lining_ua:null;
			$modelp->lining_ru = !empty($model_copy->lining_ru)?$model_copy->lining_ru:null;
			$modelp->lining_en = !empty($model_copy->lining_en)?$model_copy->lining_en:null;
			$modelp->size_range_ua = !empty($model_copy->size_range_ua)?$model_copy->size_range_ua:null;
			$modelp->size_range_ru = !empty($model_copy->size_range_ru)?$model_copy->size_range_ru:null;
			$modelp->size_range_en = !empty($model_copy->size_range_en)?$model_copy->size_range_en:null;
			$modelp->color = 'NEW COLOR';
			$modelp->catalog_id = !empty($model_copy->catalog_id)?$model_copy->catalog_id:null;
			$modelp->price = !empty($model_copy->price)?$model_copy->price:null;
			$modelp->new_price = !empty($model_copy->new_price)?$model_copy->new_price:null;
			$modelp->curent = !empty($model_copy->curent)?$model_copy->curent:null;
			$modelp->parent_color = $id_product;
			$modelp->status = 1;
			if($modelp->save())
			
				$count = count($model_copy_options);
				for ($i=0; $i < $count; $i++) {
					$_models=new Options;
					$_models->id_product = $modelp->id;
					$_models->id_option = $model_copy_options[$i]['id_option'];
					$_models->option = $model_copy_options[$i]['option'];
					if($_models->save()) true;
				}
		}

		return $modelp->id;
	}


	public function actionDelete($id)
	{		
		$models = Product::model()->findByPk($id);
		$path_img = $models->images;
		$path_smoll = $models->images_small;
		if($models->delete()){
			if($path_img && file_exists('.'.$path_img) || $path_smoll && file_exists('.'.$path_smoll)){
				unlink('.'.$path_img);
				unlink('.'.$path_smoll);
			}
		}

		$model = Images::model()->findAll('id_product = "'.$id.'"');
		$modelOptions = Options::model()->findAll('id_product = "'.$id.'"');
		
		foreach ($model as $value) {
		$path_img = $value->path;
		if($value->delete()){
			if($path_img && file_exists('.'.$path_img)){
				unlink('.'.$path_img);
			}
		}
		}
		foreach ($modelOptions as $valueOptions) {
			if($valueOptions->delete()) true;
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		if(isset($_GET['value']) && isset($_GET['id'])){
			$id = $_GET['id'];
			$model = $this->loadModel($id);
			$model->status = $_GET['value'];
			if($model->save())
				$this->redirect('product');
		}

		$model=new Product('search');
		$model->unsetAttributes();
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function listDataDropOptions($id = null){
		$all_options = Option::model()->findAll();
		$opt = '<select name="Options[id_option][]" id="Options_id_option" class="input-large">';
		$opt .= '<option ">Выберите опцию</option>';
		foreach ($all_options as $value) {
			$getId = $this->getField($id);
			if($value->id==$getId->id_option){
			$opt .= '<option selected value="'.$value->id.'">'.$value->title_option.'</option>';
			} else {
			$opt .= '<option value="'.$value->id.'">'.$value->title_option.'</option>';	
			}	
		}
		$opt .= '</select>';
		
		return $opt;
	}


	public function getField($id = null){
		return Options::model()->find('id = '.$id);
	}


	public function loadModelDelOptions($id)
	{
		$model=Options::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelOptions($id)
	{
		$model=Options::model()->findAll('id_product = '.$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}