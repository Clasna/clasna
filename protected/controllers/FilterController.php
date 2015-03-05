<?php

class FilterController extends Controller
{
	public function actionIndex()
	{
		$Allcatalog = Catalog::getAllCatalog();
		$Color = Color::model()->findAll();
		$Size = Size::model()->findAll();
		if(isset($_GET['get'])){
		$get = htmlspecialchars($_GET['get']);
			if(strripos($get, 'rgb') !== false){
				$getUrl = $explode = explode('rgb', $get);
			} else {
				$get = $_GET['get'];
			}
		}
		$connection=Yii::app()->db;
		if(isset($get)){
			$filter_size = htmlspecialchars($get);
			$findSize = Options::model()->findAllByAttributes(array('option'=>$filter_size));
			$findFilterSize = array();
			foreach ($findSize as $key => $value) {
				$findFilterSize[] = Product::model()->findbyattributes(array('id'=>$value->id_product,'status'=>1));
			}
		}
		if(isset($getUrl[1])){
			$filter_color = $getUrl[1];
			$sql = 'SELECT * FROM {{product}} WHERE color = "#'.$filter_color.'" AND status = "1"';
			$findFilterColor=$connection->createCommand($sql)->queryAll();
		}
		$this->render('index',array(
			'Allcatalog'=>$Allcatalog,
			'Color'=>$Color,
			'Size'=>$Size,
			'findFilterSize'=>!empty($findFilterSize)?$findFilterSize:null,
			'findFilterColor'=>!empty($findFilterColor)?$findFilterColor:null,
			));
	}

}