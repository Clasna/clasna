<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	//public $layout='/layouts/main';

	//public $menu=array();
    public $layout = 'admin.views.layouts.main';
	public $breadcrumbs=array();

	public function accessRules()
    {
     return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index'),
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
}