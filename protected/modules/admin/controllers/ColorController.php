<?php

class ColorController extends Admin
{

	public function actionCreate()
	{
		$model=new Color;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Color']))
		{
			$model->attributes=$_POST['Color'];
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

		if(isset($_POST['Color']))
		{
			$model->attributes=$_POST['Color'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	public function actionView()
	{
		if(isset($_GET['getid'])){
			$idGet = $_GET['getid'];
			$this->loadModelDelOptions($idGet)->delete();
			$this->redirect(array('view'));
		}

		if(isset($_POST['Color']))
		{
			$id_option = 2;
			$count = count($_POST['Color']['color']);
			for ($i=0; $i < $count; $i++) {
				if(isset($_POST['Color']['id'][$i])){
					$models = Color::model()->find('id = '.$_POST['Color']['id'][$i]);
					$models->id_option = $id_option;
					$models->number_color = $_POST['Color']['number_color'][$i]; 
					$models->color = $_POST['Color']['color'][$i];
					$models->rgb = $_POST['Color']['rgb'][$i];
					$models->lining = $_POST['Color']['lining'][$i]; 
					$models->status = $_POST['Color']['status'][$i];
					$models->update();
				} else {
					if(!empty($_POST['Color']['number_color'][$i])) {
						$ColorM = new Color;
						$ColorM->id_option = $id_option;
						$ColorM->number_color = $_POST['Color']['number_color'][$i];  
						$ColorM->color = $_POST['Color']['color'][$i];
						$ColorM->rgb = $_POST['Color']['rgb'][$i];
						$ColorM->lining = $_POST['Color']['lining'][$i]; 
						$ColorM->status = $_POST['Color']['status'][$i];
						if(!$ColorM->save(false)) true;
					}
				}
			}
				$this->redirect(array('view'));
		}
		$model = new Color;
		$modelAll = $this->loadModelColor();
		$_model = new Options;
		$this->render('view',array('model'=>$model,'_model'=>$_model,'modelAll'=>$modelAll));
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
		$model=new Color('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Color']))
			$model->attributes=$_GET['Color'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Color::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelColor()
	{
		$model=Color::model()->findAll(array('order'=>'number_color'));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function listDataDropOptions($id = null){
		$all_options = Option::model()->findAll();
		$opt = '<select name="Options[id_option][]" id="Options_id_option" class="input-large">';
		$opt .= '<option ">Выберите опцию</option>';
		foreach ($all_options as $value) {
			$getId = $this->getField($id);
			if($value->id==$getId->id){
			$opt .= '<option selected value="'.$value->id.'">'.$value->title_option.'</option>';
			} else {
			$opt .= '<option value="'.$value->id.'">'.$value->title_option.'</option>';	
			}	
		}
		$opt .= '</select>';
		
		return $opt;
	}

	public function loadModelDelOptions($id)
	{
		$model=Color::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getField($id = null){
		return Option::model()->find('id = '.$id);
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='color-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
