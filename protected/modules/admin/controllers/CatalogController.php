<?php

class CatalogController extends Admin
{
	public $imgPath = '/images/catalog';

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Catalog;

		if(isset($_POST['Catalog']))
		{
			$image = CUploadedFile::getInstance($model,'path');
			$model->attributes=$_POST['Catalog'];
			if($image){
				$model->path = $image->name;
			}
			if($model->validate()){
				if($image){
							$imgFileName = $model->path = $this->imgPath.'/'.time().'_'.$image->name;
							$image->saveAs( '.'.$imgFileName );
						}
				$slug = $this->SlugHelperUrl($_POST['Catalog']['name_ua']);
				$model->url = $slug;
				if($model->save())
					$this->redirect(array('update','id'=>$model->id));
			}
		}
		$main = $this->listDataDropHeader();
		$this->render('create',array(
			'model'=>$model,
			'main'=>$main,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_img = $model->path;
		$model->scenario = 'update';

		$this->performAjaxValidation($model);

		if(isset($_POST['Catalog']))
		{
			$model->attributes=$_POST['Catalog'];
			$image = CUploadedFile::getInstance($model, 'path');
			if($image){
				$imgFileName = $model->path = $this->imgPath . '/' . time() . '_' . $image->name;
				$imgFileName = '.'.$imgFileName;
			} else {
				$model->path = $old_img;
			}

			if($model->validate()){
				if($image){
					$image->saveAs( $imgFileName );
					if($old_img && file_exists('.'.$old_img)){
						unlink('.'.$old_img);
					}
				}
			$slug = $this->SlugHelperUrl($_POST['Catalog']['name_ua']);
			$model->url = $slug;
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
			}	
		}
		$main = $this->listDataDropHeader($model->id);
		$this->render('update',array(
			'model'=>$model,
			'main'=>$main,
		));
	}


	public function actionDelete($id)
	{
		$model = Catalog::model()->findByPk($id);
		$path_img = $model->path;
		if($model->delete()){
			if($path_img && file_exists('.'.$path_img)){
				unlink('.'.$path_img);
			}
		}

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
				$this->redirect('catalog');
		}

		$model=new Catalog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Catalog']))
			$model->attributes=$_GET['Catalog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function listDataDropHeader($id = null){
		$all_options = array('null' => 'Без типа каталога','main_menu'=>'Вверхнее главное меню','main_content'=>'Главное контент каталоги');
		$opt = '<select name="Catalog[header]" id="Catalog_header" class="input-large">';
		$opt .= '<option ">Выберите тип каталога</option>';
		foreach ($all_options as $key => $value) {
			if(isset($id)){
			$getId = $this->getField($id);
			}
			if($key==$getId->header){
			$opt .= '<option selected value="'.$key.'">'.$value.'</option>';
			} else {
			$opt .= '<option value="'.$key.'">'.$value.'</option>';	
			}	
		}
		$opt .= '</select>';
		
		return $opt;
	}
	public function getField($id = null){
		return Catalog::model()->find('id = '.$id);
	}

	public function loadModel($id)
	{
		$model=Catalog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='catalog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
