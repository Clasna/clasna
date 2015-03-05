<?php

class OptionController extends Admin
{

	public function actionCreate()
	{
		$model=new Option;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Option']))
		{
			$model->attributes=$_POST['Option'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Option']))
		{
			$model->attributes=$_POST['Option'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		$color = new Color;
		$size = new Size;

		
		$model=new Option('search');
		$model->unsetAttributes();
		if(isset($_GET['Option']))
			$model->attributes=$_GET['Option'];

		$this->render('admin',array(
			'model'=>$model,
			'color'=>$color,
			'size'=>$size,
		));
	}

	public function loadModel($id)
	{
		$model=Option::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='option-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
