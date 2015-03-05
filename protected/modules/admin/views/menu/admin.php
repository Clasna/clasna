<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-grid').yiiGridView('update', {
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
			<li class="active">Управление меню</li>
		</ul>
		<!-- .breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Меню</h3>
				<?php echo CHtml::link('Добавить меню', array('create'), array('class' => 'btn btn-primary create_button')); ?>

				<div class="table-header">
					Управление Меню
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
								'id'=>'articles-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									array(
										'name'=>'title',
										'value'=>'CHtml::link("$data->title", "menu/update/$data->id");',
										'type'=>'raw'
									),
									/*array(
										'name'=>'page_id',
										'value'=>'$data->content->name',
									),*/
									array(
										'name'=>'status',
										'value'=>'$data->status?"Да":"Нет"',
										'filter'=>CHtml::activeDropDownList($model, 'status',
											array(
												'1'=>'Да',
												'0'=>'Нет',
											),
											array('empty' => 'Все')
										),
										'filterHtmlOptions'=>array('width'=>20),
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
	<!-- /.page-content -->
</div>
