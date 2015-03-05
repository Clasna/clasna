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
				<a href="/admin">Главная</a>
			</li>

			<li>
				<a href="/admin/user">Пользователь</a>
			</li>
			<li>
				<?=$model->username;?>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Редактирование</h1>
		</div>

		<div class="row-fluid">
			<div class="col-xs-12">
				<?php $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile,'order'=>$order)); ?>
			</div>
		</div>
	</div>
</div>

