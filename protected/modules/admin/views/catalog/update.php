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
				<a href="/admin/catalog">Каталог</a>
			</li>
			<li>
				Редактирование каталога - <?=$model->name_ua;?>
			</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>Редактирование</h1>
		</div>
<?php echo CHtml::link('Добавить каталог', array('create'), array('class' => 'btn btn-primary create_button')); ?>
		<div class="row-fluid">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<?php $this->renderPartial('_form', array('model'=>$model,'main'=>$main)); ?>
			</div>
		</div>
	</div>
</div><!-- /.main-content -->

