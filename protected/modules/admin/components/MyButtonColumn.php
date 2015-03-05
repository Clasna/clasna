<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 22.05.13
 * Time: 23:40
 * To change this template use File | Settings | File Templates.
 */
Yii::import('zii.widgets.grid.CButtonColumn');

class MyButtonColumn extends CButtonColumn
{

    public function init()
    {
		$this->viewButtonOptions = array(
			'class'=>'blue'
		);
		$this->updateButtonOptions = array(
			'class'=>'green'
		);
		$this->deleteButtonOptions = array(
			'class'=>'red'
		);
		$this->viewButtonLabel = '<i class="icon-zoom-in bigger-130"></i>';
		$this->updateButtonLabel = '<i class="icon-pencil bigger-130"></i>';
		$this->deleteButtonLabel = '<i class="icon-trash bigger-130"></i>';

		$this->htmlOptions = array('class'=>'action-buttons');

        parent::init();
    }

	protected function renderButton($id,$button,$row,$data)
	{
		if (isset($button['visible']) && !$this->evaluateExpression($button['visible'],array('row'=>$row,'data'=>$data)))
			return;
		$label=isset($button['label']) ? $button['label'] : $id;
		$url=isset($button['url']) ? $this->evaluateExpression($button['url'],array('data'=>$data,'row'=>$row)) : '#';
		$options=isset($button['options']) ? $button['options'] : array();

		if(!isset($options['title']))
			$options['title']=$label;
		if(isset($button['imageUrl']) && is_string($button['imageUrl'])){
			/*echo CHtml::link('<i class="'.$iconAttribute.''.'"></i>',$url,$options);*/
			echo CHtml::link($label,$url,$options);
		}

		else
			echo CHtml::link($label,$url,$options);
	}
}
