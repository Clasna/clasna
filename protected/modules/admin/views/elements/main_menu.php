<div class="sidebar" id="sidebar">
<script type="text/javascript">
	try {
		ace.settings.check('sidebar', 'fixed')
	} catch (e) {
	}
</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<!--<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>-->
<!-- 			<a href='#' class="btn btn-success">
				<i class="icon-file"></i>
			</a> -->

			<!--<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>-->
			<a href='/admin/content' class="btn btn-info">
				<i class="icon-file-text-alt"></i>
			</a>

			<!--<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>-->
			<a href='/admin/menu' class="btn btn-warning">
				<i class="icon-list"></i>
			</a>

			<!--<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>-->
			<a href='/admin/setting' class="btn btn-danger">
				<i class="icon-cogs"></i>
			</a>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div>
	<!-- #sidebar-shortcuts -->

		<?php $this->widget('MyMenu',array(
			'activeCssClass'=>'active',
			'linkLabelWrapper'=>'span',
			'linkLabelWrapperHtmlOptions'=>array(
				'class'=>'menu-text'
			),
			'htmlOptions'=>array(
				'class'=>'nav nav-list'
			),
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/admin'), 'active'=>$this->id == 'default', 'icon'=>'icon-dashboard'),
				array('label'=>'Страницы', 'url'=>array('/admin/content'), 'active'=>$this->id == 'content', 'icon'=>'icon-file-text-alt'),
				array('label'=>'Блог', 'url'=>array('/admin/blog'), 'active'=>$this->id == 'blog', 'icon'=>'icon-list'),
				/*array('label'=>'Меню', 'url'=>array('/admin/menu'), 'active'=>$this->id == 'menu', 'icon'=>'icon-list'),*/
				array('label'=>'Портфолио', 'url'=>array('/admin/portfolio'), 'active'=>$this->id == 'portfolio', 'icon'=>'icon-camera-retro'),
				array('label'=>'Пользователи', 'url'=>array('/admin/user'), 'active'=>$this->id == 'user', 'icon'=>'icon-user'),
				array('label'=>'Каталоги', 'url'=>array('/admin/catalog'), 'active'=>$this->id == 'catalog', 'icon'=>'icon-folder-close'),
				array('label'=>'Опций', 'url'=>array('/admin/option'), 'active'=>$this->id == 'option', 'icon'=>'icon-cog'),
				array('label'=>'Продукт', 'url'=>array('/admin/product/index'), 'active'=>$this->id == 'product', 'icon'=>'icon-shopping-cart'),
				array('label'=>'Заказы', 'url'=>array('/admin/order'), 'active'=>$this->id == 'order', 'icon'=>'icon-truck'),
				array('label'=>'Магазины', 'url'=>array('/admin/stores'), 'active'=>$this->id == 'stores', 'icon'=>'icon-map'),
				),
			)); ?>


<div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
	try {
		ace.settings.check('sidebar', 'collapsed')
	} catch (e) {
	}
</script>
</div>