<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
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
			<li class="active">Управление опциями продукта</li>
		</ul>
		<!-- .breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Опций</h3>
				<?php echo CHtml::link('Добавить опцию', array('create'), array('class' => 'btn btn-primary create_button')); ?>

				<div class="table-header">
					Управление опциями продукта
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
								'id'=>'content-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									array(
										'name'=>'title_option',
										'value'=>'CHtml::link("$data->title_option", "option/update/$data->id");',
										'type'=>'raw',
									),
									array(
										'class'=>'MyButtonColumn',
										'filterHtmlOptions'=>array('width'=>70),
										'template'=>'{update} {delete}',
									),
								),
							)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Опций</h3>
				<div class="table-header">
					Управление цетом продукта
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<table class="table table-striped table-bordered table-hover dataTable">
						<tbody>
						<tr class="odd">
						<td><a href="color/view">Цвет</a></td><td class="action-buttons"></td>
						</tr>
						<tr class="odd">
						<td><a href="size/view">Размер</a></td><td class="action-buttons"></td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>