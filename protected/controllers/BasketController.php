<?php

class BasketController extends Controller
{

	public function actionShopping()
	{
		if(isset($_REQUEST['min'])){
			$min = (int)$_REQUEST['min'];
			$size = (int)$_REQUEST['size'];
			$this->minusCart($min,$size);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		if(isset($_REQUEST['basket'])){
			$add = (int)$_REQUEST['basket'];
			$size = (int)$_REQUEST['size'];
			$this->addCart($add,$size);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}


		if(isset($_REQUEST['del'])){
			$del = (int)$_REQUEST['del'];
			$size = (int)$_REQUEST['size'];
			$this->delCart($del,$size);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		if(isset($_POST['counter_product'])){
			$counter = (int)$_POST['counter_product'];
			$request = (int)$_POST['id_product'];
			$size = (int)$_POST['size'];
			$this->addInputCart($request, $counter, $size);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		$pay = new PayForm;
		if(isset($_POST['PayForm'])){
			$pay->attributes = $_POST['PayForm'];
			if($pay->validate()){
				$session=new CHttpSession;
				$session->open();
				$order = json_decode($session['order'], true);

				$basket['order']['city_method'] = $_POST['PayForm']['city'];
				$basket['order']['street_method'] = $_POST['PayForm']['street'];
				$basket['order']['sm'] = $_POST['PayForm']['sm'];
				$basket['order']['payment_method'] =  $_POST['PayForm']['payment_method'];
				$basket['order']['your_comments'] = $_POST['PayForm']['your_comments'];
				$basket['order']['promo_code'] =  $_POST['PayForm']['promo_code'];
				$basket['order']['step_1'] =  '1';
				$session['order'] = json_encode($basket);
					$this->redirect('/'.Yii::app()->language.'/basket/address');
			} 
		}

		$session=new CHttpSession;
		$session->open();
		$users = json_decode($session['users'], true);

		$model=new LoginForm;
		if(Yii::app()->user->id){
			$id = Yii::app()->user->id;
			$profiles = Profiles::model()->find('user_id = "'.$id.'"');
		}
		$step_1 = 1;

		if(isset($_POST['LoginForm']))
		{
			$users["users"]["div"] = 1;
			$session['users'] = json_encode($users);

			$model->attributes=$_POST['LoginForm'];
			if($model->validate()){
				if(isset($_POST['LoginForm']['username'])){

					$_keys = User::model()->find('email = "'.$_POST['LoginForm']['username'].'"');

				}
				if(isset($_keys)){
						if($_keys->active_true == 0){
							Yii::app()->user->setFlash('active_true',Yii::t('user','activate_your_account'));
						} else {
							if($model->login()){
								unset($users["users"]["div"]);
								$session['users'] = json_encode($users);
								$this->redirect('/'.Yii::app()->language.'/basket/shopping');
							}

						}
					}
				}

		}
		//$session->destroy();
		//$pr = json_decode($session['basket'], true);
		//$this->deBag($pr);
		$blockDiv = $users["users"]["div"];
		$guest_block = $users["users"]["guest"];

		if(isset($_GET['guest'])){
			$guest = htmlspecialchars($_GET['guest']);
			if(isset($users)) unset($users["users"]["div"]);
			$users["users"]["guest"] = 1;
			$session['users'] = json_encode($users);

			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}
		$ClientAgeent = Content::model()->findByPk('10');
		$productAll = Product::getPublicProduct();
		$this->render('shopping',array(
			'model'=>$model,
			'profiles'=>isset($profiles)?$profiles:null,
			'step_1'=>$step_1,
			'productAll'=>$productAll,
			'blockDiv'=>$blockDiv,
			'guest_block'=>$guest_block,
			'pay'=>$pay,
			'ClientAgeent'=>$ClientAgeent,
		));
	}
	public function actionPay(){

		$session=new CHttpSession;
		$session->open();
		$order = json_decode($session['order'], true);
		if(isset($basket['order']['step_2'])){
			if($basket['order']['step_2'] == 2){
				true;
			} else {
				$this->redirect('/'.Yii::app()->language.'/basket/shopping');
			}
		} else {
				$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		if(Yii::app()->user->id){
			$id = Yii::app()->user->id;
			$profiles = Profiles::model()->find('user_id = "'.$id.'"');
			$_user = User::model()->find('id = "'.$id.'"');
		} else {
			$profiles = new Profiles;
		}

		$this->render('pay',array(
			'profiles'=>$profiles,
			'_user'=>$_user,
			'step_3'=>$step_3,
			'order'=>$order,
		));
	}

	public function actionAddress()
	{
		$session=new CHttpSession;
		$session->open();
		$basket = json_decode($session['order'], true);
		if(isset($basket['order']['step_1'])){
			if($basket['order']['step_1'] == 1){
				true;
			} else {
				$this->redirect('/'.Yii::app()->language.'/basket/shopping');
			}
		} else {
				$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		if(Yii::app()->user->id){
			$id = Yii::app()->user->id;
			$profiles = Profiles::model()->find('user_id = "'.$id.'"');
			$_user = User::model()->find('id = "'.$id.'"');
		} else {
			$profiles = new Profiles;
		}

		if(isset($_POST['Profiles'])){

			$profiles->attributes = $_POST['Profiles'];
			if($profiles->validate()){
					$order = json_decode($session['order'], true);

					$basket['order']['name'] = $_POST['Profiles']['name'];
					$basket['order']['surname'] = $_POST['Profiles']['surname'];
					$basket['order']['to_transfer_destination'] = $_POST['to_transfer_destination'];
					$basket['order']['phone'] = $_POST['Profiles']['phone'];
					$basket['order']['d_phone'] = $_POST['Profiles']['d_phone'];
					$basket['order']['email'] = $_POST['Profiles']['email'];
					$basket['order']['postal_code'] = $_POST['Profiles']['postal_code'];
					$basket['order']['country'] = $_POST['Profiles']['country'];
					$basket['order']['region'] = $_POST['Profiles']['region'];
					$basket['order']['city'] = $_POST['Profiles']['city'];
					$basket['order']['street'] = $_POST['Profiles']['street'];
					$basket['order']['mach'] = $_POST['mach'];
					$basket['order']['sm'] = $order['order']['sm'];
					$basket['order']['payment_method'] =  $order['order']['payment_method'];
					$basket['order']['your_comments'] = $order['order']['your_comments'];
					$basket['order']['promo_code'] =  $order['order']['promo_code'];
					$basket['order']['city_method'] =  $order['order']['city_method'];
					$basket['order']['street_method'] =  $order['order']['street_method'];
					$basket['order']['step_2'] =  '2';
					$session['order'] = json_encode($basket);

						$this->redirect('/'.Yii::app()->language.'/basket/confirmation');
			}
		}

		$step_2 = 2;
		$productAll = Product::getPublicProduct();
		$this->render('address',array(
			'profiles'=>$profiles,
			'_user'=>$_user,
			'step_2'=>$step_2,
			'productAll'=>$productAll,
		));
	}

	public function actionConfirmation(){

		$session=new CHttpSession;
		$session->open();
		$basket = json_decode($session['order'], true);

		if(isset($basket['order']['step_2'])){
			if($basket['order']['step_2'] == 2){
				true;
			} else {
				$this->redirect('/'.Yii::app()->language.'/basket/address');
			}
		} else {
				$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}

		if(Yii::app()->user->id){
			$id = Yii::app()->user->id;
			$profiles = Profiles::model()->find('user_id = "'.$id.'"');
			$_user = User::model()->find('id = "'.$id.'"');
		}
		if(isset($_POST['conform'])){
			$profiles = new Order;
			$orderBasket = new Basket;

		$orders = json_decode($session['order'], true);

			$profiles->email = $orders['order']['email'];
			$profiles->phone = $orders['order']['phone'];
			$profiles->d_phone = $orders['order']['d_phone'];
			$profiles->country = $orders['order']['country'];
			$profiles->region = $orders['order']['region'];
			$profiles->city = $orders['order']['city'];
			$profiles->street = $orders['order']['street'];
			$profiles->shipping = $orders['order']['sm'];
			$profiles->st_ship = $orders['order']['street_method'];
			$profiles->payment = $orders['order']['payment_method'];
			$profiles->promo = $orders['order']['promo_code'];
			$profiles->pay_comment = $orders['order']['your_comments'];
			$profiles->m_index = $orders['order']['postal_code'];
			$profiles->sum = Product::getSum();
			$profiles->name = $orders['order']['name'];
			$profiles->surname = $orders['order']['surname'];
			if(!$profiles->save(false)) true;
				$baskets = json_decode($session['basket'], true);
				if(isset($baskets['basket'])){
					foreach ($baskets['basket'] as $key => $value) {
						foreach ($value as $valueS) {
							$orderBasket->id_order = $profiles->id;
							$orderBasket->id_product = $valueS['id'];
							$orderBasket->size = $valueS['size'];
							$orderBasket->count = $valueS['count'];
							if(!$orderBasket->save(false)) true;
						}
					}
				}
			Yii::app()->user->setFlash('order_true',Yii::t('basket','your_order'));
			unset($orders['order']);
			$session['order'] = json_encode($orders);
			unset($baskets['basket']);
			$session['basket'] = json_encode($baskets);
			unset($users['users']);
			$session['users'] = json_encode($users);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}
		if(isset($_POST['cancel'])){
			unset($orders['order']);
			$session['order'] = json_encode($orders);
			unset($baskets['basket']);
			$session['basket'] = json_encode($baskets);
			unset($users['users']);
			$this->redirect('/'.Yii::app()->language.'/basket/shopping');
		}
		$step_3 = 3;
		$this->render('confirmation',array(
			'profiles'=>$profiles,
			'_user'=>$_user,
			'step_3'=>$step_3,
			'_basket'=>$basket['order'],
		));
	}

	public function generate_password($number = 16)
	{
	    $arr = array('a','b','c','d','e','f',
	                 'g','h','i','j','k','l',
	                 'm','n','o','p','r','s',
	                 't','u','v','x','y','z',
	                 'A','B','C','D','E','F',
	                 'G','H','I','J','K','L',
	                 'M','N','O','P','R','S',
	                 'T','U','V','X','Y','Z',
	                 '1','2','3','4','5','6',
	                 '7','8','9','0','.',',',
	                 '(',')','[',']','!','?',
	                 '&','^','%','@','*','$',
	                 '<','>','/','|','+','-',
	                 '{','}','`','~');
	    // Генерируем пароль
	    $pass = "";
	    for($i = 0; $i < $number; $i++)
	    {
	      // Вычисляем случайный индекс массива
	      $index = rand(0, count($arr) - 1);
	      $pass .= $arr[$index];
	    }
	    return $pass;
	}

	public function getNameUser($yiCheck){
		return User::model()->find('username = "'.$yiCheck.'"');
	}
	public function getEmailUser($yiCheck){
		return User::model()->find('email = "'.$yiCheck.'"');
	}

	public function minusCart($request,$size){
		if($request){
			$session=new CHttpSession;
			$session->open();


			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			}

			$basket['basket'][$request][$size]['id'] = $request;
			$basket['basket'][$request][$size]['count'] = (!empty($basket['basket'][$request][$size]['count'])) ? $basket['basket'][$request][$size]['count']-1 : null;
			if($basket['basket'][$request][$size]['count'] == 0){
				$basket['basket'][$request][$size]['count'] = 1;
			}
			if($basket['basket'][$request][$size]['count'] == null){
				unset($basket['basket'][$size][$request]);
				if($basket['basket'][$request] == null)
					unset($basket['basket'][$request][$size][$request]);
			} 
			$session['basket'] = json_encode($basket);
		}
	}

	public function addInputCart($request, $counter, $size){
		if($request){

			$session=new CHttpSession;
			$session->open();


			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			}
			$basket['basket'][$request][$size]['count'] = $counter;
			if($basket['basket'][$request][$size]['count'] == null){
				unset($basket['basket'][$request][$size]);
			} 
			if($basket['basket'][$request] == null){
				unset($basket['basket'][$request]);
			}
			if($basket['basket'] == null){
				unset($basket['basket']);
			}
			$session['basket'] = json_encode($basket);
		}
	}

	public function addCart($request,$size){
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
	}

	public function delCart($request,$size){
		if($request){
			$session=new CHttpSession;
			$session->open();

			if($session['basket']){
			$basket = json_decode($session['basket'], true);
			unset($basket['basket'][$request][$size]);
			if($basket['basket'][$request] == null){
				unset($basket['basket'][$request]);
			}
			if($basket['basket'] == null){
				unset($basket['basket']);
			}
			$session['basket'] = json_encode($basket);
			}
		}
	}
}