<?php

class BlogController extends Admin
{
	public $imgPath = '/images/blog';

	public function actionCreate()
	{
		$model=new Blog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$image = CUploadedFile::getInstance($model, 'images');
			$model->attributes=$_POST['Blog'];
			if($image){
					$imgFileName = $model->images = $this->imgPath . '/' . uniqid() . '_' . $image->name;
					$imgFileName = '.'.$imgFileName;
			}
			if($image){
			$image->saveAs( $imgFileName );
			}
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_img = $model->images;
		$model->scenario = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];
			$image = CUploadedFile::getInstance($model, 'images');
			if($image){
				$imgFileName = $model->images = $this->imgPath . '/' . uniqid() . '_' . $image->name;
				$imgFileName = '.'.$imgFileName;
			} else {
				$model->images = $old_img;
			}
			if($model->save())
				if($image){
					$image->saveAs( $imgFileName );
					if($old_img && file_exists('.'.$old_img)){
						unlink('.'.$old_img);
					}
				}
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		$modelS = Blog::model()->findByPk($id);
		$path_img = $model->images;
		if($model->delete()){
			if($path_img && file_exists('.'.$path_img)){
				unlink('.'.$path_img);
			}
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$model=new Blog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Blog']))
			$model->attributes=$_GET['Blog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Blog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
