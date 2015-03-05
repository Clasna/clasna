<?php

class SizeController extends Admin
{

	public function actionView()
	{

		if(isset($_GET['getid'])){
			$idGet = $_GET['getid'];
			$this->loadModelDelOptions($idGet)->delete();
			$this->redirect(array('view'));
		}

		if(isset($_POST['Size']))
		{
			$id_option = (int)$_POST['Options']["id_option"][0];
			$count = count($_POST['Size']['size']);
			/*echo '<pre>';
			var_dump($_POST);die();
			echo '</pre>';*/
			for ($i=0; $i < $count; $i++) {
				if(isset($_POST['Size']['id'][$i])){
					$models = Size::model()->find('id = '.$_POST['Size']['id'][$i]);
					$models->id_option = $id_option; 
					$models->size = $_POST['Size']['size'][$i];
					$models->status = $_POST['Size']['status'][$i];
					$models->update();
				} else {
					$models = new Size;
					$models->id_option = $id_option; 
					$models->size = $_POST['Size']['size'][$i];
					$models->status = $_POST['Size']['status'][$i];
					$models->save();	
				}
			}
				$this->redirect(array('view'));
		}
		$modelAll = $this->loadModelSize();
		$model = new Size;
		$_model = new Options;
		$this->render('view',array('model'=>$model,'_model'=>$_model,'modelAll'=>$modelAll));
	}


	public function loadModel($id)
	{
		$model=Size::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelSize()
	{
		$model=Size::model()->findAll();
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
		$model=Size::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getField($id = null){
		return Option::model()->find('id = '.$id);
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='size-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
