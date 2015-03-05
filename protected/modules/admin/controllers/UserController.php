<?php

class UserController extends Admin
{
	public function actionCreate()
	{
		$model=new User;
		$profile = new Profiles;
		$this->performAjaxValidation($model);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate()){
			if(!$model->save(false))
				$this->redirect(array('update','id'=>$model->id));
			}
		}
		
		if(isset($_POST['Profiles'])){
			$profile->attributes=$_POST['Profiles'];
			$profile->user_id = $model->id;
			if(!$profile->save(false))
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_password = $model->password;
		$profile = $this->loadModelProfile($id);
		$this->performAjaxValidation($model);
		if($profile == null){
			$profile = new Profiles;
		}
		$order = Order::model()->find('email = "'.$model->email.'"');
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if(!empty($_POST['User']['password'])){
				$model->password = md5($_POST['User']['password']);
			} else {
				$model->password = $old_password;
			}
			if(!$model->save(false)) true;
				$this->redirect(array('update','id'=>$model->id));
		}

		if(isset($_POST['Profiles'])){
			$profile->attributes=$_POST['Profiles'];	
			if($profile->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
			'order'=>$order,
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

		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionView($get)
	{
		if(isset($get)){
		$model = $this->loadModelView($get);
		}
		$_basket = $this->getBasket($model);
		$this->render('view',array(
			'model'=>$model,
			'_basket'=>$_basket,
		));
	}

	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getBasket($model){
		if($model){
			$basket = array();
			foreach ($model as $value) {
				if($value->id){
					$basket[] = Basket::model()->findAll('id_order = "'.$value->id.'"');
				}
			}
		}
		return $basket;
	}

	public function loadModelView($get)
	{
		$model=Order::model()->findAll('email = "'.$get.'"');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelProfile($id)
	{
		$model=Profiles::model()->find('user_id = "'.$id.'"');
		/*if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');*/
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
