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
			<li class="active">Управление Каталогами</li>
		</ul>
		<!-- .breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Каталог</h3>
				<?php echo CHtml::link('Добавить каталог', array('create'), array('class' => 'btn btn-primary create_button')); ?>

				<div class="table-header">
					Управление Каталогами
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
								'id'=>'content-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									array(
										'name'=>'name_ua',
										'value'=>'CHtml::link("$data->name_ua", "catalog/update/$data->id");',
										'type'=>'raw',
									),
									array(
										'name'=>'header',
										'value'=>'$data->header ? "Да" :  "Нет"',
										'filter'=>CHtml::activeDropDownList($model, 'header',
											array(
												'1'=>'Да',
												'0'=>'Нет',
											),
											array('empty' => 'Все')
										),
										'filterHtmlOptions'=>array('width'=>20),
										'type'=>'raw',
									),
									array(
										'name'=>'status',
										/*'value'=>'$data->status?"Да":"Нет"',*/
										'value'=>'$data->status ? CHtml::link("Скрыть", "?value=0&id=$data->id") :  CHtml::link("Показать", "?value=1&id=$data->id")',
										'filter'=>CHtml::activeDropDownList($model, 'status',
											array(
												'1'=>'Да',
												'0'=>'Нет',
											),
											array('empty' => 'Все')
										),
										'filterHtmlOptions'=>array('width'=>20),
										'type'=>'raw',
									),
/*									array(
										'name'=>'getdate',
										'filter'=>false,
										'filterHtmlOptions'=>array('width'=>100)
									),*/
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
</div>