<?php

class CatalogController extends Controller
{
	/*const ITEMS_PER_PAGE = 8;*/

	public function actionIndex()
	{
		if(isset($_GET['url'])){
			$url = htmlspecialchars($_GET['url']);
			$getCat = Catalog::model()->findByAttributes(array('url'=>$url));
		} else {
		 	throw new CHttpException(404, 'Такого каталога не существует.');
		}
		if($getCat){
			$product = Product::model()->findAllByAttributes(array('catalog_id'=>$getCat->id),array('order' => 'id ASC'/*,'limit'=>self::ITEMS_PER_PAGE*/));
		}
		if($getCat){
			$getParent = Catalog::model()->findAllByAttributes(array('parent_id'=>$getCat->id,'status'=>1));
		}
            if(Yii::app()->language == 'ua'){
	            $description = $getCat->description_ua;
				$keywords = $getCat->keywords_ua;
				$this->pageTitle = $getCat->title_ua.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'ru') {
	            $description = $getCat->description_ru;
				$keywords = $getCat->keywords_ru;
				$this->pageTitle = $getCat->title_ru.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'en') {
	            $description = $getCat->description_en;
				$keywords = $getCat->keywords_en;
				$this->pageTitle = $getCat->title_en.' | '.CHtml::encode(Yii::app()->name);
            }
		Yii::app()->clientScript->registerMetaTag($description, 'description');
		Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');

		$Allcatalog = Catalog::getAllCatalog();
		$Color = Color::model()->findAll();
		$Size = Size::model()->findAll();

		$this->render('index',array(
			'url'=>$url,
			'getCat'=>$getCat,
			'getParent'=>$getParent,
			'product'=>!empty($product)?$product:null,
			'Allcatalog'=>$Allcatalog,
			'Color'=>$Color,
			'Size'=>$Size,
			'findFilterSize'=>!empty($findFilterSize)?$findFilterSize:null,
			'findFilterColor'=>!empty($findFilterColor)?$findFilterColor:null,
			));
	}

	public function actionWoman(){

		$getCat = Catalog::model()->findByAttributes(array('id'=>9,'header'=>'main_content'));
		$product = Product::model()->findAllByAttributes(array('order' => 'id ASC'));
		    if(Yii::app()->language == 'ua'){
	            $description = $getCat->description_ua;
				$keywords = $getCat->keywords_ua;
				$this->pageTitle = $getCat->title_ua.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'ru') {
	            $description = $getCat->description_ru;
				$keywords = $getCat->keywords_ru;
				$this->pageTitle = $getCat->title_ru.' | '.CHtml::encode(Yii::app()->name);
            } elseif(Yii::app()->language == 'en') {
	            $description = $getCat->description_en;
				$keywords = $getCat->keywords_en;
				$this->pageTitle = $getCat->title_en.' | '.CHtml::encode(Yii::app()->name);
            }



		$Color = Color::model()->findAll();
		$Size = Size::model()->findAll();

		$this->render('woman',array(
			'url'=>$url,
			'getCat'=>$getCat,
			'getParent'=>$getParent,
			'product'=>!empty($product)?$product:null,
			'Allcatalog'=>$Allcatalog,
			'Color'=>$Color,
			'Size'=>$Size,
			'findFilterSize'=>!empty($findFilterSize)?$findFilterSize:null,
			'findFilterColor'=>!empty($findFilterColor)?$findFilterColor:null,
			));
	}

	public function navs($get){
			$sum = $get->parent_id;
			$str_href = null;
			while (true) {
				$dataReader = Catalog::model()->find('id = "'.$sum.'"');
				if($dataReader){
				$sum = $dataReader->parent_id;
				}
				if($dataReader){
				$str_href = ' <a href="/catalog/'.$dataReader->url.'">'.$dataReader->name.'</a>'.$str_href;
				}
				if(isset($dataReader->parent_id) == 0){
					break;
				}
			}
			return $str_href;
	}

	public function nav($get){
		$href = '<a href="/">Главная</a>';
		$href .= $this->navs($get);
		$href .= ' <a href="/catalog/'.$get->url.'" class="last_cr">'.$get->name.'</a>';
		return $href;
	}

	public function actionUpdateAjax()
    {
    	if(isset($_POST)){
    	$catalog_id = $_POST['catalog_id'];
        $count = (int)$_POST['count'];
        $couter = isset($count) ? (int)self::ITEMS_PER_PAGE + $count : 0 ;
        //$Sql = "SELECT * FROM {{product}} WHERE catalog_id = {$catalog_id} AND status = 1 ORDER BY id ASC LIMIT {$couter}";
   		//$product = Yii::app()->db->createCommand($Sql)->queryAll();
   		$product = Product::model()->findAllByAttributes(array('catalog_id'=>$catalog_id),array('order' => 'id ASC','limit'=>$couter));
        $fullCount = $this->FullCount($catalog_id);
    	}
        $this->renderPartial('_ajaxContent', array('product'=>$product,'fullCount'=>$fullCount), false, true);
    }

    public function FullCount($id) {
        $countSql = "SELECT id FROM {{product}} WHERE catalog_id = {$id} AND status = 1 ";
        $dataS = Yii::app()->db->createCommand($countSql)->queryAll();
        return count($dataS);
    }


}