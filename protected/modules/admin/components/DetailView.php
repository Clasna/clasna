<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Slavon
 * Date: 25.10.13
 * Time: 16:50
 * To change this template use File | Settings | File Templates.
 */
Yii::import('zii.widgets.CDetailView');
class DetailView extends CDetailView
{

	public $tagName = 'div';



	public function init(){
		$this->htmlOptions['class'] = 'profile-user-info profile-user-info-striped';
		$this->itemTemplate = '<div class="profile-info-row">
									<div class="profile-info-name"> {label} </div>

									<div class="profile-info-value">
										<span class="editable editable-click" id="username">{value}</span>
									</div>
								</div>';
	}

}
