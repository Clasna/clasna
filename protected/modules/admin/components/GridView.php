<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 22.05.13
 * Time: 22:03
 * To change this template use File | Settings | File Templates.
 */
Yii::import('zii.widgets.grid.CGridView');

class GridView extends CGridView
{
    public $enableHistory = false;
    public $summaryText = '';
    public $cssFile = '';
    public $itemsCssClass = 'table table-striped table-bordered table-hover dataTable';
    public $pagerCssClass = 'dataTables_paginate paging_bootstrap';
	public $headerCssClass = 'sorting';
    public $pager= array(
        'class' => 'LinkPager',
    );

    public function __construct($owner=null)
    {
        //$this->cssFile = Yii::app()->theme->baseUrl . '/css/my_styles/admin_grid.css';
        parent::__construct($owner);
    }


}
