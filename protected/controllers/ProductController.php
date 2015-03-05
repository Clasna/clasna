<?php

class ProductController extends Controller
{
	public function actionIndex($url = null)
	{	
		if(isset($_GET['url'])){
			$urlproduct = htmlspecialchars($_GET['url']);
			$product = Product::getProduct($urlproduct);
			$imagesproduct = Images::model()->findAll('id_product = "'.$product->id.'"');
			$size = Product::getProductOptions($product->id);
		}

		if(isset($_POST['toCart'])){
		$request = $_POST['id_product'];
		$size = $_POST['size'];
		$this->addCartPost($request, $size);
		$this->redirect(array('/product','url'=>$product->url));
		}

		if(isset($_REQUEST['del'])){
		$this->delCart($_REQUEST['del']);
		$this->redirect(array('/product','url'=>$product->url));
		}

		if(isset($_REQUEST['min'])){
		$this->minusCart($_REQUEST['min']);
		$this->redirect(array('/product','url'=>$product->url));
		}

		if(isset($_POST['counter_product'])){
			$counter = (int)$_POST['counter_product'];
			$request = (int)$_POST['id_product'];
			$size = $_POST['size'];
			$this->addInputCart($request, $counter, $size);
			$this->redirect(array('/product','url'=>$product->url));
		}

			// $session=new CHttpSession;
			// $session->open();
			// $session->destroy();
		
            if(Yii::app()->language == 'ua'){
            	if(isset($getCat)){
	            	$description = $getCat->description_ua;
					$keywords = $getCat->keywords_ua;
					$this->pageTitle = $getCat->title_ua.' | '.CHtml::encode(Yii::app()->name);
				}
            } elseif(Yii::app()->language == 'ru') {
            	if(isset($getCat)){
		            $description = $getCat->description_ru;
					$keywords = $getCat->keywords_ru;
					$this->pageTitle = $getCat->title_ru.' | '.CHtml::encode(Yii::app()->name);
            	}
            } elseif(Yii::app()->language == 'en') {
            	if(isset($getCat)){
		            $description = $getCat->description_en;
					$keywords = $getCat->keywords_en;
					$this->pageTitle = $getCat->title_en.' | '.CHtml::encode(Yii::app()->name);
            	}
            }
		if(isset($description)) Yii::app()->clientScript->registerMetaTag($description, 'description');
		if(isset($keywords)) Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');

		$products = Product::getProductIndex();
		$int_prod = Product::getInTProduct();
		$brt = $this->getScr($product->catalog_id);
		$color = $this->getParentColor($product);
		$parentColor = $this->ColorProduct($product);
		$Color = Color::model()->findAll();
		$Size = Size::model()->findAll();
		$Allcatalog = Catalog::getAllCatalog();
		$this->render('index',array(
			'product'=>isset($product)?$product:null,
			'imagesproduct'=>isset($imagesproduct)?$imagesproduct:null,
			'size'=>$size,
			'products'=>$products,
			'int_prod'=>$int_prod,
			'brt'=>$brt,
			'color'=>$color,
			'Color'=>$Color,
			'parentColor'=>$parentColor,
			'Size'=>$Size,
			'Allcatalog'=>$Allcatalog
		));
	}

	public function ColorProduct($id){
		if(isset($id->color))
			$models = Color::model()->find('id = "'.$id->color.'"');
		if(isset($models))
			if($models->lining != null) $div = '<div class="wrapper-color"><div class="one-color" style="background:'.$models->rgb.'"></div><div class="second-color" style="background:'.$models->lining.'"></div></div>';
	           	else $div = '<div class="wrapper-color"><div class="weed-color" style="background:'.$models->rgb.'"></div></div>';

	   	$options = '
		        <a href="'.$id->url.'" class="color_a">
		        '.$div.'
		        <span>'.$models->number_color.'</span>
		        </a>';
		return $options;
	}

	public function getParentColor($id){
		if($id->parent_color != 0){
			$dataSql = "SELECT `color`,`url` FROM {{product}} WHERE parent_color = '{$id->parent_color}'";
			$model = Yii::app()->db->createCommand($dataSql)->queryAll();
		}
		$color = array();
		if(isset($model)){
            foreach($model as $color_id){
            $models = Color::model()->findByPk($color_id['color']);
            $color[$color_id['url']] = $models;
            } 
		}
		unset($color[$id->url]);
		$options = array();
		if($color){
            foreach($color as $key => $val_color){
	            	if($val_color['lining'] != null) $div = '<div class="wrapper-color"><div class="one-color" style="background:'.$val_color['rgb'].'"></div><div class="second-color" style="background:'.$val_color['lining'].'"></div></div>';
	            	else $div = '<div class="wrapper-color"><div class="weed-color" style="background:'.$val_color['rgb'].'"></div></div>';

		        $options[] = '
		        <a href="'.$key.'" class="color_a">
		        '.$div.'
		        <span>'.$val_color['number_color'].'</span>
		        </a>';
            } 
		}
		return  $options;
	}

	public function getScr($id){
	    $href = '<a href="/">Главная</a>';
	    $sum = $id;
		while (true) {
			$dataReader = Catalog::model()->find('id = "'.$sum.'"');
			$sum = $dataReader->parent_id;
			$str_href = null;
			if($dataReader){
				$str_href = ' <a href="/catalog/'.$dataReader->url.'">'.$dataReader->name_ua.'</a>'.$str_href;
			}
			if($dataReader->parent_id == 0){
				break;
			}
		}
		return $href.' '.$str_href;
	}

	public function minusCart($request){
		if($request){
			$session=new CHttpSession;
			$session->open();


			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			}

			$basket['basket'][$request]['id'] = $request;
			$basket['basket'][$request]['count'] = (!empty($basket['basket'][$request]['count'])) ? $basket['basket'][$request]['count']-1 : null;
			if($basket['basket'][$request]['count'] == null){
				unset($basket['basket'][$request]);
			} 
			$session['basket'] = json_encode($basket);
		}
	}

	public function addInputCart($request, $counter){
		if($request){
			$session=new CHttpSession;
			$session->open();


			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			}
			$basket['basket'][$request]['count'] = $counter;
			if($basket['basket'][$request]['count'] == null){
				unset($basket['basket'][$request]);
			}
			$session['basket'] = json_encode($basket);
		}
	}

	public function actionUpdateAjaxBasket(){
		if(isset($_POST['form'])){
		if($_POST['form'][0]['value'] == null){
			//echo '<script>alert("Выбирите размер");</script>';
			echo $this->UpAjaxSize();
		} else {
			$request = $_POST['form'][1]['value'];
			$size = $_POST['form'][0]['value'];
			if($request){

				$session=new CHttpSession;
				$session->open();

				if($session['basket']){
				$basket = json_decode($session['basket'], true);
				}
				$basket['basket'][$request][$size]['id'] = $request;
				$basket['basket'][$request][$size]['size'] = $size;
				$basket['basket'][$request][$size]['count'] = (!empty($basket['basket'][$request][$size]['count'])) ? $basket['basket'][$request][$size]['count']+1 : 1;
				$session['basket'] = json_encode($basket);
			}
		$block = 'block';
		}
		$this->renderPartial('//layouts/_item', array('basket' => isset($basket)?$basket:null,'block'=>isset($block)?$block:null,false, true));
	}
	}

	public function UpAjaxSize(){
		$echo = '<script>';
		$echo .= '$("#vyber_razmera").show();';
		$echo .= '</script>';
		return $echo;
	}

	public function addCartPost($request, $size){
		if($request){
			$session=new CHttpSession;
			$session->open();

			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			}
			$basket['basket'][$request][$size]['id'] = $request;
			$basket['basket'][$request][$size]['size'] = $size;
			$basket['basket'][$request][$size]['count'] = (!empty($basket['basket'][$request][$size]['count'])) ? $basket['basket'][$request][$size]['count']+1 : 1;
			$session['basket'] = json_encode($basket);
		}
		//$this->renderPartial('//layouts/_item', array('item' => $item,false, true));
	}

	public function delCart($request){
		if($request){
			$session=new CHttpSession;
			$session->open();

			if($session['basket']){
			$basket = json_decode($session['basket'], true);

			unset($basket['basket'][$request]);
			$session['basket'] = json_encode($basket);
			}
		}
	}
}