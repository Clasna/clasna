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
			<li class="active">Управление заказом</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Заказы</h3>
				<?php //echo CHtml::link('Добавить продукт', array('create'), array('class' => 'btn btn-primary create_button')); ?>

				<div class="table-header">
					Управление заказом
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
								'id'=>'content-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									array(
										'name'=>'fio',
										'value'=>'CHtml::link("$data->fio", "order/view/$data->id");',
										'type'=>'raw',
									),
									array(
										'name'=>'status',
										/*'value'=>'$data->status?"Да":"Нет"',*/
										'value'=>'$data->status ? CHtml::link("Принятый", "?value=0&id=$data->id") :  CHtml::link("Не принятый", "?value=1&id=$data->id")',
										'filter'=>CHtml::activeDropDownList($model, 'status',
											array(
												'0'=>'Принятый',
												'1'=>'Не принятый',
											),
											array('empty' => 'Все')
										),
										'filterHtmlOptions'=>array('width'=>20),
										'type'=>'raw',
									),
									array(
										'class'=>'MyButtonColumn',
										'filterHtmlOptions'=>array('width'=>70),
										'template'=>'{view} {delete}',
									),
								),
							)); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>