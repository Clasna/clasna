<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 22.05.13
 * Time: 22:04
 * To change this template use File | Settings | File Templates.
 */
Yii::import('system.web.widgets.pagers.CLinkPager');

class LinkPager extends CLinkPager
{
    public $header = false;
    public $cssFile = false;
    public $firstPageLabel = 'Первая';
    public $prevPageLabel = 'Предыдущая';
    public $nextPageLabel = 'Следующая';
    public $lastPageLabel = 'Последняя';
	public $htmlOptions = array(
        'class'=>'pagination'
    );

    public function __construct($owner=null)
    {
		$this->selectedPageCssClass = 'active';
		$this->maxButtonCount = 5;
        //$this->cssFile = Yii::app()->theme->baseUrl . '/css/new_pager.css';
		parent::__construct($owner);
    }

	public function run()
	{
		$this->registerClientScript();
		$buttons=$this->createPageButtons();
		if(empty($buttons))
			return;
		echo $this->header;
		Yii::app()->controller->renderPartial('/elements/grid_pager', array(
			'pager'=>CHtml::tag('ul',$this->htmlOptions,implode("\n",$buttons))
		));
		echo $this->footer;
	}



}
