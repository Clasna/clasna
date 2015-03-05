<?php

class StoresController extends Admin
{
	public $imgPath = '/images/stores';

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Stores;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stores']))
		{
			$image = CUploadedFile::getInstance($model,'images');
			$model->attributes=$_POST['Stores'];
			if($image){
				$model->images = $image->name;
			}
			if($model->validate()){
				if($image){
							$imgFileName = $model->images = $this->imgPath.'/'.time().'_'.$image->name;
							$image->saveAs( '.'.$imgFileName );
						}
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_img = $model->images;
		$model->scenario = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stores']))
		{
			$model->attributes=$_POST['Stores'];
			$image = CUploadedFile::getInstance($model, 'path');
			if($image){
				$imgFileName = $model->images = $this->imgPath . '/' . time() . '_' . $image->name;
				$imgFileName = '.'.$imgFileName;
			} else {
				$model->images = $old_img;
			}

			if($model->validate()){
				if($image){
					$image->saveAs( $imgFileName );
					if($old_img && file_exists('.'.$old_img)){
						unlink('.'.$old_img);
					}
				}
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = Stores::model()->findByPk($id);
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
		if(isset($_GET['value']) && isset($_GET['id'])){
			$id = $_GET['id'];
			$model = $this->loadModel($id);
			$model->status = $_GET['value'];
			if($model->save())
				$this->redirect('stores');
		}

		$model=new Stores('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stores']))
			$model->attributes=$_GET['Stores'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Stores the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Stores::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Stores $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='stores-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
