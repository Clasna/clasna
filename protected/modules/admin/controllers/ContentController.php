<?php

class ContentController extends Admin
{

	public function actionCreate()
	{
		$model=new Content;


		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$slug = $this->SlugHelperUrl($_POST['Content']['name_ua']);
			$model->url = $slug;
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
				//$this->redirect('admin');
		}
		$footer = $this->listDataDropFooter();
		$this->render('create',array(
			'model'=>$model,
			'footer'=>$footer,
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$slug = $this->SlugHelperUrl($_POST['Content']['name_ua']);
			$model->url = $slug;
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		$footer = $this->listDataDropFooter($model->id);
		$this->render('update',array(
			'model'=>$model,
			'footer'=>$footer,
		));
	}

	public function listDataDropFooter($id = null){
		$all_options = array('null' => 'Без типа нижнего меню','clasna'=>'clasna','cooperation'=>'Сотрудничество');
		$opt = '<select name="Content[footer]" id="Content_footer" class="input-large">';
		$opt .= '<option ">Выберите тип каталога</option>';
		foreach ($all_options as $key => $value) {
			$getId = $this->getField($id);
			if($key==$getId->footer){
			$opt .= '<option selected value="'.$key.'">'.$value.'</option>';
			} else {
			$opt .= '<option value="'.$key.'">'.$value.'</option>';	
			}	
		}
		$opt .= '</select>';
		
		return $opt;
	}

	public function getField($id = null){
		if(isset($id))
			$coper = Content::model()->find('id = '.$id);
		return $coper;
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
		$model=new Content('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Content']))
			$model->attributes=$_GET['Content'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAdmin()
	{
		$model=new Content('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Content']))
			$model->attributes=$_GET['Content'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function loadModel($id)
	{
		$model=Content::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
