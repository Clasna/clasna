<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 22.10.13
 * Time: 13:51
 * To change this template use File | Settings | File Templates.
 */
Yii::import('zii.widgets.CMenu');
class MyMenu extends CMenu
{

	protected function renderMenuItem($item)
	{
		if(isset($item['url']))
		{
			$icon = !empty($item['icon']) ? '<i class="'.$item['icon'].'"></i>' : '';
			/*$label=$this->linkLabelWrapper===null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);*/
			$label=$this->linkLabelWrapper===null ? $item['label'] : $icon.CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
			//$label = $icon.'<span class="menu-text"> '.$item['label'].' </span>';

			return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());

		}
		else
			return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
	}

}
