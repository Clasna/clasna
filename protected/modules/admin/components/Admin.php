<?php

class Admin extends Controller
{

    public $layout = 'admin.views.layouts.main';
    //public $defaultAction = 'admin';
    public $pageTitle = 'Admin';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('admin', 'index','view', 'create', 'update', 'delete'),
                'roles'=>array('2'),
            ),
            /*array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),*/
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function SlugHelperUrl($text)
    {
        $matrix=array(
            "й"=>"i","ц"=>"c","у"=>"u","к"=>"k","е"=>"e","н"=>"n",
            "г"=>"g","ш"=>"sh","щ"=>"sh","з"=>"z","х"=>"h","ъ"=>"\'",
            "ф"=>"f","ы"=>"i","в"=>"v","а"=>"a","п"=>"p","р"=>"r",
            "о"=>"o","л"=>"l","д"=>"d","ж"=>"zh","э"=>"ie","ё"=>"e",
            "я"=>"ya","ч"=>"ch","с"=>"s","м"=>"m","и"=>"i","т"=>"t",
            "ь"=>"\'","б"=>"b","ю"=>"yu","і"=>"i","ї"=>"i",
            "Й"=>"I","Ц"=>"C","У"=>"U","К"=>"K","Е"=>"E","Н"=>"N",
            "Г"=>"G","Ш"=>"SH","Щ"=>"SH","З"=>"Z","Х"=>"X","Ъ"=>"\'",
            "Ф"=>"F","Ы"=>"I","В"=>"V","А"=>"A","П"=>"P","Р"=>"R",
            "О"=>"O","Л"=>"L","Д"=>"D","Ж"=>"ZH","Э"=>"IE","Ё"=>"E",
            "Я"=>"YA","Ч"=>"CH","С"=>"S","М"=>"M","И"=>"I","Т"=>"T",
            "Ь"=>"\'","Б"=>"B","Ю"=>"YU","І"=>"I","Ї"=>"I",
            "«"=>"","»"=>""," "=>"-",
        );
        foreach($matrix as $from=>$to)
            $text=mb_eregi_replace($from,$to,$text);
        $text = preg_replace('/[^A-Za-z0-9_\-]/', '', $text);

        return trim(strtolower($text));
    }

	public function init(){

		Yii::app()->clientScript->registerScript('unwrap', '
			$(".main-content").unwrap()
			', CClientScript::POS_READY);
	}
}
