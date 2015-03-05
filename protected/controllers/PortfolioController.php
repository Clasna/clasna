<?php

class PortfolioController extends Controller
{
	public function actionIndex()
	{
		$model = $this->loadModel();

		$description = 'Портфолио сайта ANAZONE';
		$keywords = 'Портфолио сайта ANAZONE';
		$this->pageTitle = 'Портфолио сайта ANAZONE'.' | '.CHtml::encode(Yii::app()->name);
		Yii::app()->clientScript->registerMetaTag($description, 'description');
		Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');

		$this->render('index',array('model'=>$model));
	}

	public function loadModel()
	{
		$model=Portfolio::model()->findAll('status = 1');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}