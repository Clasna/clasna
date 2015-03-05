<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 28.10.13
 * Time: 11:16
 * To change this template use File | Settings | File Templates.
 */
class ModerateColumn extends CDataColumn
{

	public $name;
	public $sortable = true;
	public $callbackUrl;
	public $_flagClass = 'moderate_link';
	public $filter;

	public function init(){
		parent::init();
		$cs = Yii::app()->getClientScript();
		$gridId = $this->grid->getId();
		$script = <<<SCRIPT
		jQuery(".{$this->_flagClass}").live("click", function(e){
			e.preventDefault();
			var link = this;
			$.ajax({
				dataType: "json",
				cache: false,
				url: link.href,
				success: function(data){
					$('#$gridId').yiiGridView.update('$gridId');
				}
			})
		})
SCRIPT;
		$cs->registerScript(__CLASS__.$gridId.'#moderate_link', $script);

	}

	protected function renderDataCellContent($row, $data){
		$value = CHtml::value($data, $this->name);
		$this->callbackUrl['pk'] = $data->primaryKey;
		$this->callbackUrl['name'] = urlencode($data->primaryKey);
		$this->callbackUrl['value'] = (int)empty($value);

		$link = CHtml::normalizeUrl($this->callbackUrl);
		$prefix = !empty($value) ? 'Да'.' / ' : 'Нет'.' / ';
		echo $prefix.CHtml::link(!empty($value) ? 'Блокировать' : 'Одобрить', $link,
		array(
			'class'=>$this->_flagClass
		));
	}


}
