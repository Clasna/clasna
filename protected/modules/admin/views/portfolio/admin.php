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
			<li class="active">Управление портфоли</li>
		</ul>
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<h3 class="header smaller lighter blue">Портфоли</h3>
				<?php //echo CHtml::link('Добавить портфоли', array('create'), array('class' => 'btn btn-primary create_button')); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'portfolio-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
	)
)); ?>
				<input name="path[]" id="filesToUpload" type="file" multiple="" class="btn btn-primary create_button" onChange="makeFileList();"/>
				<script>
				function makeFileList() {
				var input = document.getElementById("filesToUpload");
				var ul = document.getElementById("fileList");
				while (ul.hasChildNodes()) {
				ul.removeChild(ul.firstChild);
				}
				for (var i = 0; i < input.files.length; i++) {
				var li = document.createElement("li");
				li.innerHTML = input.files[i].name;
				ul.appendChild(li);
				}
				if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.innerHTML = 'No Files Selected';
				ul.appendChild(li);
				}
				}
				</script>
				<div class="notification success png_bg">
				<div><b>Массовая загрузка фото</b></div>
				</div>

				<ul id="fileList"></ul>


<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<?php echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-info','name'=>'portfolio')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
				<div class="table-header">
					Управление портфоли
				</div>
<style type="text/css">
	.odd td a img {
		width: 100px !important;
		height: 100px !important;
	}
	.even td a img {
		width: 100px !important;
		height: 100px !important;
	}
</style>
				<div class="table-responsive">
					<div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
						<?php $this->widget('GridView', array(
								'id'=>'content-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									array(
										'name'=>'path',
										'value' => '$data->path ? CHtml::link(CHtml::image($data->path), Yii::app()->controller->createUrl("update", array("id" => $data->id))) : ""',
            							'type' => 'html',
									),
									array(
										'name'=>'alt'
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
</div>