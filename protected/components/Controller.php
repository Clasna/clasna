<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function init()
    {   
        if (!empty($_GET['language']))
            Yii::app()->language = $_GET['language'];
        parent::init();
    }

    public function menuCatalog(){
    	return Catalog::getCatalogHeader($header = 'main_menu');
    }

    public function menuFooter($footer = null){
    	return Content::getContentFooter($footer);
    }

    public function urlLang(){
    	$exp = explode('/', Yii::app()->request->url);
		if(is_array($exp)){
			$count = count($exp);
			$array = array();
			for ($i=0; $i < $count; $i++) { 
				if($exp[$i] == null && $exp[$i] == ''){
					unset($exp[$i]);
				} else {
					if($exp[$i] == Yii::app()->language){
						unset($exp[$i]);
					} else {
						$array[] = $exp[$i];
					}
				}
			}
		}
		$impl = implode('/', $array);
		return $impl;
    }

    public function p(){
    	$p = array('ua'=>'UAH','ru'=>'RUB','en'=>'$USD');
    		foreach ($p as $key => $value) {
	    		if(Yii::app()->language == $key) {
	    		echo '<option selected value="'.$key.'">'.$value.'</option>';
	    		} else {
	    		echo '<option value="'.$key.'">'.$value.'</option>';
	    		}
    		}
    }

    public function getMainContent($id){
    	return Content::model()->findByPk($id);
    }

    public function getEmailUserProf(){
    	$id_user = Yii::app()->user->id;
    	$connection=Yii::app()->db;
    	$sql='SELECT `email` FROM {{user}} WHERE id = "'.$id_user.'"';
    	if($id_user) $model = $connection->createCommand($sql)->queryRow();
    	return $model; 
    }

    public function getReturnUrl(){
    	if(strripos(Yii::app()->request->urlReferrer,'basket') !== false){
    		return $getUrl = '/';
    	} else {
    		return $getUrl = Yii::app()->request->urlReferrer;
    	}
    }

    public function deBag($params){
    	echo '<pre>';
    	var_dump($params);
    	echo '</pre>';
    }
}