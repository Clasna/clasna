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
			<li class="active">Управление пользователями</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Пользователи</h3>
				<?php echo CHtml::link('Добавить Пользователями', array('create'), array('class' => 'btn btn-primary create_button')); ?>

				<div class="table-header">
					Управление пользователями
				</div>

				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
							'id'=>'cause-grid',
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'columns'=>array(
								array(
									'name'=>'email',
									'value'=>'CHtml::link("$data->email", "/admin/user/update/$data->id");',
									'type'=>'raw'
								),
								array(
										'name'=>'active_true',
										'value'=>'$data->active_true?"Да":"Нет"',
										'filter'=>CHtml::activeDropDownList($model, 'active_true',
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
<!-- /.main-content -->

