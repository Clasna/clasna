<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try {
				ace.settings.check('breadcrumbs', 'fixed')
			} catch (e) {
			}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="#">Главная</a>
			</li>

			<li>
				<a href="/admin/content">Страницы</a>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Новая страница</h1>
		</div>

		<div class="row-fluid">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<?php $this->renderPartial('_form', array('model'=>$model,'footer'=>$footer)); ?>
			</div>
		</div>
	</div>
</div>