<?php

class MenuController extends Admin
{


	public function actionCreate()
	{
		$model=new Menu;


		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
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

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionIndex()
	{
		$model=new Menu('search');
		$model->unsetAttributes();
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdmin()
	{
		$model=new Menu('search');
		$model->unsetAttributes();
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
