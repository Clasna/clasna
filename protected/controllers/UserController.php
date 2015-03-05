<?php

class UserController extends Controller
{
	public function actionIndex()
	{
		$id = Yii::app()->user->id;
		if($id){
			$_user = $this->getUser($id);
			$_order = $this->getOrder($_user->email);
			if($this->getProfiles($id)){
				$_profile = $this->getProfiles($id);
			} else {
				$_profile = new Profiles;
			}
		} else {
			$this->redirect('/');
		}

		if(isset($_POST['sendprofiles'])){

			if(isset($_POST['Profiles'])){
				$_profile->attributes=$_POST['Profiles'];
					$_profile->user_id = $id;
					if($_profile->update()) true;						
			}

			if(isset($_POST['User'])){
				$_user->attributes = $_POST['User'];
				if($_user->validate()){
					if($_user->save()) true;
				}
			}
				$this->refresh();
		}
		$productAll = Product::getPublicProduct();
		$updateClient = Wholesalers::model()->find('user_id = "'.$id.'"');
		$this->render('index',array(
			'_profile' => $_profile,
			'_user' => $_user,
			'_order' => $_order,
			'productAll'=>$productAll,
			'updateClient' => $updateClient, 
		));
	}

	public function actionWholesalers(){
		$id = Yii::app()->user->id;

		if($id){
			$_user = $this->getUser($id);
			$_order = $this->getOrder($_user->email);
		if($this->getProfiles($id)){
				$_profile = $this->getProfiles($id);
			} else {
				$_profile = new Profiles;
			}
		} else {
			$this->redirect('/');
		}
		/*echo '<pre>';
		var_dump($this->getCountry());
		echo '</pre>';*/
		$_client = Content::model()->findByPk('9');
		$_wholesalers = new Wholesalers;
		$this->performAjaxValidationWho($_wholesalers);
		if(isset($_POST['Wholesalers'])){
			$_wholesalers->attributes=$_POST['Wholesalers'];
			if($_wholesalers->validate()){
				$_wholesalers->user_id = $id;
				if($_wholesalers->save()) Yii::app()->user->setFlash('wholesalers',Yii::t('user','your_application'));
			}
		}
		$updateClient = $this->WholesalersClient($id);

		$this->render('wholesalers',array(
			'_profile' => $_profile,
			'_user' => $_user,
			'_order' => $_order,
			'_client' => isset($_client) ? $_client : null,
			'_wholesalers' => $_wholesalers,
			'updateClient' => $updateClient,
		));
	}

	public function actionUpdateAjaxContryId(){
		if(isset($_POST['id'])) $city = $this->getCity($_POST['id']);
		echo '<pre>';
		var_dump($city);die();
		echo '</pre>';
		$option = '<select>';
		foreach ($city as $key => $value) {
		$option .= '<option value="'.$value->title.'">'.$value->title.'</option>';
		}
		$option .= '<select>';
		echo $option;
	}

	public function actionUpdateAjaxRegionId(){
		if(Yii::app()->language == 'ua'){
	        $lang = 1;
	    } elseif(Yii::app()->language == 'ru') {
	        $lang = 0;
	    } elseif(Yii::app()->language == 'en') {
	        $lang = 3;
	    }
		if(isset($_POST['id'])) $region = $this->getRegion($_POST['id'],$lang);
		if(!empty($region)) echo $this->select($region);
			else {
				$city = $this->getCity($_POST['id'],$lang);
				echo $this->select($city);
			}
	}

	public function select($values, $params = null){
		$option = '<select name="'.$params.'">';
		foreach ($values as $key => $value) {
		$option .= '<option value="'.$value['title'].'">'.$value['title'].'</option>';
		}
		$option .= '<select>';
		return $option;
	}
	public function getCity($country_id,$lang){

	    $headerOptions = array(
	        'http' => array(
	            'method' => "GET",
	            'header' => "Accept-language: en\r\n" .
	            "Cookie: remixlang=$lang\r\n"
	        )
	    );
	    $methodUrl = 'http://api.vk.com/method/database.getCities?v=5.28&need_all=1&count=1000&country_id='.$country_id;
	    $streamContext = stream_context_create($headerOptions);
	    $json = file_get_contents($methodUrl, false, $streamContext);
	    $arr = json_decode($json, true);
	    return $arr['response']['items'];
	}

	public function getRegion($country_id,$lang){
	    $headerOptions = array(
	        'http' => array(
	            'method' => "GET",
	            'header' => "Accept-language: en\r\n" .
	            "Cookie: remixlang=$lang\r\n"
	        )
	    );
	    $methodUrl = 'http://api.vk.com/method/database.getRegions?v=5.28&need_all=0&offset=0&count=1000&country_id='.$country_id;
	    $streamContext = stream_context_create($headerOptions);
	    $json = file_get_contents($methodUrl, false, $streamContext);
	    $arr = json_decode($json, true);
	    return $arr['response']['items'];
	}

	public function getCountry(){

		if(Yii::app()->language == 'ua'){
                $lang = 1;
        } elseif(Yii::app()->language == 'ru') {
                $lang = 0;
        } elseif(Yii::app()->language == 'en') {
                $lang = 3;
        }

	    $headerOptions = array(
	        'http' => array(
	            'method' => "GET",
	            'header' => "Accept-language: en\r\n" .
	            "Cookie: remixlang=$lang\r\n"
	        )
	    );
	    $methodUrl = 'http://api.vk.com/method/database.getCountries?v=5.28&need_all=0&count=1000';
	    $streamContext = stream_context_create($headerOptions);
	    $json = file_get_contents($methodUrl, false, $streamContext);
	    $arr = json_decode($json, true);
	    return $arr['response']['items'];
	}

	public function getCountryAPI()
	{
		return Chtml::listData($this->getCountry(),'id','title');
	}

	public function WholesalersClient($user_id){
		return Wholesalers::model()->findallbyattributes(array('user_id'=>$user_id,'status'=>0));
	}

	public function actionProfily(){
		$id = Yii::app()->user->id;
		if($id){
			$_user = $this->getUser($id);
			if($this->getProfiles($id)){
				$_profile = $this->getProfiles($id);
			} else {
				$_profile = new Profiles;
			}
		} else {
			$this->redirect('/');
		}

		if(isset($_POST['Profiles'])){

			$_profile->attributes=$_POST['Profiles'];
			$_profile->user_id = $id;
			if($_profile->save()) 
				$this->redirect('profily');
		}

		$this->render('profile',array(
			'_profile' => $_profile,
			'_user' => $_user, 
		));
	}

	public function getUser($id){
		return User::model()->find('id = "'.$id.'"');
	}

	public function actionChange()
	{
		$id = Yii::app()->user->id;
		if($id){
			$_user = $this->getUser($id);
		} else {
			$this->redirect('/');
		}
		$this->performAjaxValidation($_user);

		if(isset($_POST['User'])){
				if(md5($_POST['User']['password']) == $_user->password){
					if($_POST['User']['password'] == $_POST['User']['return']){
							$_user->password = md5($_POST['User']['newpassword']);
						if($_user->save()) $_new = 'Ваш пароль был изменен';
					} else {
						$_return = 'Пароль не совпадает';
					}
				} else {
					$_password = 'Не верный пароль';
				}
		}

		$this->render('change',array(
			'_user' => $_user,
			'_return' => isset($_return)?$_return:null,
			'_password' => isset($_password)?$_password:null,
			'_new' => isset($_new)?$_new:null, 
		));
	}

	public function actionRecovery(){
	$_user = new RecoveryPass;
	if(isset($_POST['ajax']) && $_POST['ajax']==='recovery-form')
	{
		echo CActiveForm::validate($_user);
		Yii::app()->end();
	}	
	if(isset($_POST['RecoveryPass'])){
		$_user->attributes = $_POST['RecoveryPass'];
		if($_user->validate()){
		$_email = htmlspecialchars($_user->email);
		$checkEmail = RecoveryPass::checkEmailUser($_email);
			if($checkEmail != null){
			$rec_pass = RecoveryPass::sendRecoveryMail($_email);
			Yii::app()->user->setFlash('pass_true','Новый пароль был выслан к Вам на этот E-mail <b>'.$_email.'</b>');

				
			} else {
				Yii::app()->user->setFlash('pass_recovery','Такого E-mail нету в базе!');
			}
		}	
	}
	$this->render('recovery',array('_user'=>$_user));
	}

	public function getProfiles($id){
		return Profiles::model()->find('user_id = "'.$id.'"');
	}

	public function actionActive()
	{
		if(isset($_GET['hash'])){
			$hash = $_GET['hash'];
			$_hash = User::model()->find('activkey = "'.$hash.'"');
			$_hash->active_true = 1;
			if($_hash->save()) true;
		} else {
			$_hash = 'ERROR_HASH';
		}
		$this->render('active',array('_hash'=>$_hash));
	}

	public function actionOrder()
	{

	if(isset($_GET['order'])){
		$get = $_GET['order'];
		$model = $this->getOrder($get);
	}
	$_basket = $this->getBasket($model);
		$this->render('order',array(
			'model'=>$model,
			'_basket'=>$_basket,
		));
	}

	public function getOrder($get)
	{
		$model=Order::model()->findAll('email = "'.$get.'"');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-recovery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function getBasket($model){
		if($model){
			$basket = array();
			foreach ($model as $value) {
				if($value->id){
					$basket[] = Basket::model()->findAll('id_order = "'.$value->id.'"');
				}
			}
		}
		return $basket;
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

		if(isset($_POST['ajax']) && $_POST['ajax']==='userreg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate())
			{
				$username = $this->getNameUser($_POST['User']['username']);
				$email = $this->getEmailUser($_POST['User']['email']);
				$hash = hash('ripemd128', $_POST['User']['email']);
				if(isset($_POST['User']['email']) == isset($email->email)){
					Yii::app()->user->setFlash('email',Yii::t('user', 'ckeEmail1').''.$_POST['User']['email'].Yii::t('user', 'ckeEmail2'));
				}
				else {
		            $model->activkey = $hash;
		            $model->password =  md5($_POST['User']['password']);
					if($model->save()){
						$this->sendHashMail($hash,$_POST['User']['email']);
		                Yii::app()->user->setFlash('registration',Yii::t('user','active_1').'<b>'.$_POST['User']['email'].'</b>'.Yii::t('user','active_2'));
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

    			$name = '=?UTF-8?B?'.base64_encode(Yii::t('user','active_reg')).'?=';
				$subject = '=?UTF-8?B?'.base64_encode(Yii::t('user','active_reg')).'?=';
				$headers="From: $name <{$email}>\r\n".
					"Reply-To: {$email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
				$body = Yii::t('user','go_premise');
				$body .= '<a href="http://'.$_SERVER['SERVER_NAME'].'/user/active/'.$hash.'">'.Yii::t('user','activating_your_account').'</a>';

				mail($email,$subject,$body,$headers);
    	}
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
							
			// if(isset($_POST['LoginForm']['username'])){
			// $_key = User::model()->find('username = "'.$_POST['LoginForm']['username'].'"');
			// }
			if(isset($_POST['LoginForm']['username'])){
			$_keys = User::model()->find('email = "'.$_POST['LoginForm']['username'].'"');
			}

			// if(isset($_key)){
			// 	if($_key->active_true == 0){
			// 		Yii::app()->user->setFlash('active_true','Активируйте учетную запись, проверьте свою почту.');
			// 	} else {
			// 		$this->redirect(Yii::app()->user->returnUrl);
			// 	}
			// }

			if(isset($_keys)){
				if($_keys->active_true == 0){
					Yii::app()->user->setFlash('active_true',Yii::t('user','activate_your_account'));
				} else {
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			}

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	protected function performAjaxValidationWho($model)
	{
	    if(isset($_POST['ajax']) && $_POST['ajax']==='user-wholesalers-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	}
}