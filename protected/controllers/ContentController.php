<?php

class ContentController extends Controller
{
	public function actionIndex()
	{
		if($_GET['url']){
			$url = $_GET['url'];
			$getUrl = Content::model()->findByAttributes(array('url'=>$url));
			if(!$getUrl){
				throw new CHttpException(404, 'Такой страницы не существует.');
			}
		} else {
			throw new CHttpException(404, 'Такой страницы не существует.');
		}
            if(Yii::app()->language == 'ua'){
	            $description = $getUrl->description_ua;
				$keywords = $getUrl->keywords_ua;
				$this->pageTitle = $getUrl->title_ua.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'ru') {
	            $description = $getUrl->description_ru;
				$keywords = $getUrl->keywords_ru;
				$this->pageTitle = $getUrl->title_ru.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'en') {
	            $description = $getUrl->description_en;
				$keywords = $getUrl->keywords_en;
				$this->pageTitle = $getUrl->title_en.' | '.CHtml::encode(Yii::app()->name);
            }
		$productAll = Product::getPublicProductContent();
		$this->render('index',array(
			'getUrl'=>$getUrl,
			'productAll'=>$productAll,
		));
	}
}