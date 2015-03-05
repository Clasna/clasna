<?php

class PortfolioController extends Admin
{

public $imgPath = '/images/gallery';


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Portfolio']))
		{
			$model->attributes=$_POST['Portfolio'];
			$model->path = $model->path;
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		//$model = new Portfolio;
		$path_img = $model->path;
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
		$model=new Portfolio('search');
		$model->unsetAttributes();  
		if(isset($_GET['Portfolio']))
			$model->attributes=$_GET['Portfolio'];
		$img=new Portfolio;

		if(isset($_POST['portfolio']))
		{
			$images = CUploadedFile::getInstancesByName('path');

		if (isset($images) && count($images) > 0) { 
			foreach ($images as $image => $pic) {
			$newName = explode('.', $pic->name);
			$newName = rand(110, 1000).'.'.$newName[1];
			if($pic){
				$imgFileNameS = $this->imgPath . '/' . time() . '_.' .$newName;
				$imgFileName = '.'.$imgFileNameS;
			}
			$pic->saveAs( $imgFileName ); 
			$img=new Portfolio;
			$img->path = $imgFileNameS;
			$img->status = 1;
			if(!$img->save(false)) true;

			}
			}
			$this->redirect(array('index'));
		}


		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Portfolio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='portfolio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
