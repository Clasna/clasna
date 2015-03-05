<?php

class SiteController extends Controller
{
	public $layout = '//layouts/main';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionWoman(){

		$getCat = Catalog::model()->findByAttributes(array('id'=>9,'header'=>'main_content'));
		$product = Product::model()->findAllByAttributes(array('status'=>1,'type'=>'woman'),array('order' => 'id ASC'));
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

	public function actionMen(){

		$getCat = Catalog::model()->findByAttributes(array('id'=>10,'header'=>'main_content'));
		$product = Product::model()->findAllByAttributes(array('status'=>1,'type'=>'man'),array('order' => 'id ASC'));
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

		$this->render('men',array(
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

	public function actionStores(){

		$kh = Stores::getStores('2249');
		$kiev = Stores::getStores('908');
		$odesa = Stores::getStores('1551');
		    /*if(Yii::app()->language == 'ua'){
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
            }*/

		$this->render('stores',array(
			'kh'=>isset($kh)?$kh:null,
			'kiev'=>isset($kiev)?$kiev:null,
			'odesa'=>isset($odesa)?$odesa:null,
		));
	}

	public function setIdCity($id){
		if(isset($id)){
			$city = City::model()->findByPk($id);
		}
		return $city;
	}

	public function actionWholesale(){

		$getCat = Catalog::model()->findByAttributes(array('id'=>9,'header'=>'main_content'));
		$product = Product::model()->findAllByAttributes(array('status'=>1,'type'=>'woman'),array('order' => 'id ASC'));
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

		$this->render('wholesale',array(
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

	public function actionIndex()
	{
		$model = Catalog::getCatalogHeader($header = 'main_content');
		$this->render('index',array('model'=>$model));
	}

	public function classHref($model){
		if($model->id == 1){
	        echo  'spring_big';
	    } elseif($model->id == 2) {
	        echo  'spring_min';
	    } elseif($model->id == 3) {
	        echo  'spring_high';
	    } elseif($model->id == 4) {
	        echo  'presentation';
	    } elseif($model->id == 5) {
	        echo  'presentation2';
	    } elseif($model->id == 6) {
	        echo  'mans_collection';
	    } elseif($model->id == 7) {
	        echo  'summer_min';
	    } elseif($model->id == 8) {
	        echo  'summer_big';
	    }
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function getNameUser($yiCheck){
		return User::model()->find('username = "'.$yiCheck.'"');
	}
	public function getEmailUser($yiCheck){
		return User::model()->find('email = "'.$yiCheck.'"');
	}

	public function actionRegistration()
	{
		$model=new User;
        $model->scenario = 'registration';

		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate())
			{
				$username = $this->getNameUser($_POST['User']['username']);
				$email = $this->getEmailUser($_POST['User']['email']);
				$hash = hash('ripemd128', $_POST['User']['email']);
				if(isset($_POST['User']['username']) == isset($username->username)){
					Yii::app()->user->setFlash('username','Такое имя - '.$_POST['User']['username'].' уже занято.');
				} elseif(isset($_POST['User']['email']) == isset($email->email)){
					Yii::app()->user->setFlash('email','Такой E-mail - '.$_POST['User']['email'].' уже занято.');
				}
				else {
		            $model->activkey = $hash;
		            $model->password =  md5($_POST['User']['password']);
					if($model->save()){
						$this->sendHashMail($hash,$_POST['User']['email']);
		                Yii::app()->user->setFlash('registration','Актевируйте свой акаунт, перейдите в свой E-mail '.$_POST['User']['email'].' пройдите инструкцию для активаций Вашего акаунта.');
		            }
	        	}
        	}
        }

        $this->render('registration',array(
			'model'=>$model,
		));
    }

    public function sendHashMail($hash,$email){
    	if($hash && $email){

    			$name = '=?UTF-8?B?'.base64_encode('Активация регистраций!').'?=';
				$subject = '=?UTF-8?B?'.base64_encode('Активация регистраций').'?=';
				$headers="From: $name <{$email}>\r\n".
					"Reply-To: {$email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
				$body = 'Перейдите посылке, для активаций Вашей учетной записи в интернет магазине <b>"ANAZONE"</b>.<br />';
				$body .= '<a href="http://'.$_SERVER['SERVER_NAME'].'/user/active/'.$hash.'">Активация Вашей учетной записи.</a>';

				mail($email,$subject,$body,$headers);
    	}
    }

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
							
			if(isset($_POST['LoginForm']['username'])){
			$_key = User::model()->find('username = "'.$_POST['LoginForm']['username'].'"');
			}
			if(isset($_POST['LoginForm']['username'])){
			$_keys = User::model()->find('email = "'.$_POST['LoginForm']['username'].'"');
			}

			if(isset($_key)){
				if($_key->active_true == 0){
					Yii::app()->user->setFlash('active_true','Активируйте учетную запись, проверьте свою почту.');
				} else {
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}

			if(isset($_keys)){
				if($_keys->active_true == 0){
					Yii::app()->user->setFlash('active_true','Активируйте учетную запись, проверьте свою почту.');
				} else {
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			}

			}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='userreg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}